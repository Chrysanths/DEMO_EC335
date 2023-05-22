<?php

try{
    $json = file_get_contents('php://input');
    $obj = json_decode($json);

    $username = $obj->username;
    $password = $obj->password;
    $repeatpassword = $obj->repeatpassword;

    echo "Thanh cong: <br> Tai khoan cua ban: <br>" . "Ten tai khoan: " . $username . "<br>Mat khau: " . $password . "<br>";

}catch(Exception $error) {
    print_r($error);
}

?>