<?php
class UserController{

    //User Login Function
    public function ctrUserLogin(){
        if( isset($_POST['sysUser']) ){
            if( preg_match('/^[a-zA-Z0-9]+$/' , $_POST['sysUser']) && preg_match('/^[a-zA-Z0-9]+$/' , $_POST['sysPassword']) ){
                $table = 'users';
                $item = 'username';
                $value = $_POST['sysUser'];

                $respond = ModuleUsers::MdlShowUsers($table , $item , $value);

                if( $respond['username'] == $_POST['sysUser'] && $respond['password'] == $_POST['sysPassword'] ){
                    $_SESSION['beginSession'] = 'ok';
                    echo '<script>window.location = "home";</script>';
                }else{
                    echo '<br/><div class="alert alert-danger">Error on login. Please try again.alias</div>';
                }
            }
        }
    }

}
