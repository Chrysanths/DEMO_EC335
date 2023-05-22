<?php

function check($xmlfile){
    $json = file_get_contents("black_list.json");
    $blacklist = json_decode($json);

    foreach( $blacklist as $key => $val ){
        if(preg_match("/$val/", $xmlfile)){
            throw new Exception("Canrh bao blacklist: " . $val);
        }
    }
}

?>