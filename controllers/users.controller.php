<?php
class UserController{

    //User Login Function
    static public function ctrUserLogin(){

		if (isset($_POST["sysUser"])) {
			
			if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["sysUser"]) && 
				preg_match('/^[a-zA-Z0-9]+$/', $_POST["sysPassword"])) {

				$encryptpass = crypt($_POST["sysPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
				
				$table = 'users';
				$item = 'username';
				$value = $_POST["sysUser"];

                $answer = ModuleUsers::MdlShowUsers($table, $item, $value);

				//var_dump($answer);

				if($answer["username"] == $_POST["sysUser"] && $answer["password"] == $encryptpass){

					if($answer["status"] == 1){

						$_SESSION["beginSession"] = "ok";
						$_SESSION["id"] = $answer["id"];
						$_SESSION["name"] = $answer["name"];
						$_SESSION["username"] = $answer["username"];
						$_SESSION["picture"] = $answer["picture"];
						$_SESSION["profile"] = $answer["profile"];

						/*=============================================
						Register date to know last_login
						=============================================*/

						date_default_timezone_set("Asia/Colombo");

						$date = date('Y-m-d');
						$hour = date('H:i:s');

						$actualDate = $date.' '.$hour;

						$item1 = "last_login";
						$value1 = $actualDate;

						$item2 = "id";
						$value2 = $answer["id"];

						$lastLogin = ModuleUsers::mdlUpdateUser($table, $item1, $value1, $item2, $value2);

						if($lastLogin == "ok"){
							echo '<script>
								window.location = "home";
							</script>';
						}
					}else{						
						echo '<br><div class="alert alert-danger">User is deactivated</div>';					
					}
				}else{
					echo '<br><div class="alert alert-danger">User or password incorrect</div>';				
				}			
			}		
		}	
	}

    //Create User Function
    static public function ctrCreateUser(){

		if (isset($_POST["newUser"])) {
			
			if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["newName"]) &&
				preg_match('/^[a-zA-Z0-9]+$/', $_POST["newUser"]) &&
				preg_match('/^[a-zA-Z0-9]+$/', $_POST["newPasswd"])){

				/*=============================================
				VALIDATE IMAGE
				=============================================*/

				$photo = "";			
				if (isset($_FILES["newPhoto"]["tmp_name"])){
					list($width, $height) = getimagesize($_FILES["newPhoto"]["tmp_name"]);
					
					$newWidth = 500;
					$newHeight = 500;

					/*=============================================
					Let's create the folder for each user
					=============================================*/

					$folder = "views/img/users/".$_POST["newUser"];
					mkdir($folder, 0755);

					/*=============================================
					PHP functions depending on the image
					=============================================*/

					if($_FILES["newPhoto"]["type"] == "image/jpeg"){
						$randomNumber = mt_rand(100,999);						
						$photo = "views/img/users/".$_POST["newUser"]."/".$randomNumber.".jpg";						
						$srcImage = imagecreatefromjpeg($_FILES["newPhoto"]["tmp_name"]);						
						$destination = imagecreatetruecolor($newWidth, $newHeight);
						imagecopyresized($destination, $srcImage, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
						imagejpeg($destination, $photo);
					}

					if ($_FILES["newPhoto"]["type"] == "image/png") {
						$randomNumber = mt_rand(100,999);						
						$photo = "views/img/users/".$_POST["newUser"]."/".$randomNumber.".png";						
						$srcImage = imagecreatefrompng($_FILES["newPhoto"]["tmp_name"]);						
						$destination = imagecreatetruecolor($newWidth, $newHeight);
						imagecopyresized($destination, $srcImage, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
						imagepng($destination, $photo);
					}

				}

				$table = 'users';
				$encryptpass = crypt($_POST["newPasswd"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
				$data = array(
                    'name' => $_POST["newName"],
                    'username' => $_POST["newUser"],
                    'password' => $encryptpass,
                    'profile' => $_POST["newProfile"],
                    'picture' => $photo
                );
				$answer = ModuleUsers::mdlAddUser($table, $data);
				if ($answer == 'ok') {
                    echo '<script>
                    swal.fire({
                        type: "success",
                        title: "User added succesfully",
                        showConfirmButton: true,
                        confirmButtonText: "Close"
                    }).then(function(result){
                        if(result.value){
                            window.location = "users";
                        }
                    });						
                    </script>';
				}			
			}else{
				echo '<script>					
					swal.fire({
						type: "error",
						title: "No especial characters or blank fields",
						showConfirmButton: true,
						confirmButtonText: "Close"			
						}).then(function(result){
							if(result.value){
								window.location = "users";
							}
						});					
				</script>';
			}
			
		}
    }
    
    /*=============================================
	SHOW USER
	=============================================*/

	static public function ctrShowUsers($item, $value){
		$table = "users";
		$answer = ModuleUsers::MdlShowUsers($table, $item, $value);
		return $answer;
	}

	/*=============================================
	EDIT USER
	=============================================*/

	static public function ctrEditUser(){

		if (isset($_POST["EditUser"])) {			
			if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["EditName"])){
				/*=============================================
				VALIDATE IMAGE
				=============================================*/
				$photo = $_POST["currentPicture"];
				if(isset($_FILES["editPhoto"]["tmp_name"]) && !empty($_FILES["editPhoto"]["tmp_name"])){
                    list($width, $height) = getimagesize($_FILES["editPhoto"]["tmp_name"]);
                    					
					$newWidth = 500;
					$newHeight = 500;

					/*=============================================
					Let's create the folder for each user
					=============================================*/

					$folder = "views/img/users/".$_POST["EditUser"];

					/*=============================================
					we ask first if there's an existing image in the database
					=============================================*/

					if (!empty($_POST["currentPicture"])){						
						unlink($_POST["currentPicture"]);
					}else{
						mkdir($folder, 0755);
					}

					/*=============================================
					PHP functions depending on the image
					=============================================*/

					if($_FILES["editPhoto"]["type"] == "image/jpeg"){
						/*We save the image in the folder*/
						$randomNumber = mt_rand(100,999);						
						$photo = "views/img/users/".$_POST["EditUser"]."/".$randomNumber.".jpg";						
						$srcImage = imagecreatefromjpeg($_FILES["editPhoto"]["tmp_name"]);						
						$destination = imagecreatetruecolor($newWidth, $newHeight);
						imagecopyresized($destination, $srcImage, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
						imagejpeg($destination, $photo);
					}
					
					if ($_FILES["editPhoto"]["type"] == "image/png") {
						/*We save the image in the folder*/
						$randomNumber = mt_rand(100,999);						
						$photo = "views/img/users/".$_POST["EditUser"]."/".$randomNumber.".png";						
						$srcImage = imagecreatefrompng($_FILES["editPhoto"]["tmp_name"]);						
						$destination = imagecreatetruecolor($newWidth, $newHeight);
						imagecopyresized($destination, $srcImage, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
						imagepng($destination, $photo);
					}

				}
				
				$table = 'users';
				if($_POST["EditPasswd"] != ""){
					if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["EditPasswd"])){
						$encryptpass = crypt($_POST["EditPasswd"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
					} else{
						echo '<script>					
							swal.fire({
								type: "error",
								title: "No especial characters in the password or blank fields",
								showConfirmButton: true,
								confirmButtonText: "Close"
								}).then(function(result){										
									if (result.value) {						
										window.location = "users";
									}
								});							
						</script>';
					}				
				}else{
					$encryptpass = $_POST["currentPasswd"];					
				}

				$data = array(
                    'name' => $_POST["EditName"],
                    'username' => $_POST["EditUser"],
                    'password' => $encryptpass,
                    'profile' => $_POST["EditProfile"],
                    'picture' => $photo
                );

				$answer = ModuleUsers::mdlEditUser($table, $data);
				if ($answer == 'ok') {					
					echo '<script>					
						swal.fire({
							type: "success",
							title: "User edited succesfully",
							showConfirmButton: true,
							confirmButtonText: "Close"

						}).then(function(result){							
							if (result.value) {
								window.location = "users";
							}
						});					
					</script>';
				} else{
					echo '<script>						
						swal.fire({
							type: "error",
							title: "No especial characters in the name or blank field",
							showConfirmButton: true,
							confirmButtonText: "Close"
							 }).then(function(result){									
								if (result.value) {
									window.location = "users";								
								}
							});						
					</script>';
				}			
			}
		}
	
	}

	/*=============================================
	DELETE USER
	=============================================*/

	static public function ctrDeleteUser(){

		if(isset($_GET["userId"])){

			$table ="users";
			$data = $_GET["userId"];

			if($_GET["userPhoto"] != ""){
				unlink($_GET["userPhoto"]);				
				rmdir('views/img/users/'.$_GET["username"]);
			}
			$answer = ModuleUsers::mdlDeleteUser($table, $data);
			if($answer == "ok"){
				echo'<script>
				swal.fire({
					  type: "success",
					  title: "The user has been succesfully deleted",
					  showConfirmButton: true,
					  confirmButtonText: "Close"
					  }).then(function(result){					  	
						if (result.value) {
						    window.location = "users";
						}
					})
				</script>';
			}
		}
    }
    
}
