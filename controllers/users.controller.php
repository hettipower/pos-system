<?php
class UserController{

    //User Login Function
    public function ctrUserLogin(){
        if( isset($_POST['sysUser']) ){
            if( preg_match('/^[a-zA-Z0-9]+$/' , $_POST['sysUser']) && preg_match('/^[a-zA-Z0-9]+$/' , $_POST['sysPassword']) ){
                $table = 'users';
                $item = 'username';
                $value = $_POST['sysUser'];

                $reply = ModuleUsers::MdlShowUsers($table , $item , $value);

                var_dump($reply);
            }
        }
    }

}
