<?php

try{
    $xmlfile = file_get_contents('php://input');
    $dom = new DOMDocument();
    $dom->loadXML($xmlfile, LIBXML_NOENT | LIBXML_DTDLOAD);
    $info = simplexml_import_dom($dom);
    $username = $info->username;
    $password = $info->password;
    $repeatpassword = $info->repeatpassword;
    echo "Thanh cong <br> Tai khoan cua ban <br>" . "Ten tai khoan: " . $username . "<br>Mat khau: " . $password . "<br>";

} catch(Exception $error){
    echo $error->getMessage();
}

?>