<?php
    include("connect.php");

    $sql = "select * from posts order by id desc";

    $result = $conn->query($sql);

    while ($row = $result->fetch_assoc()){
        echo '<div class="item shadow-radius">' 
                . '<div class="ctn_avt_username">'
                    . ' <img src="image/' . $row['username'] . '.jpg" class="avt_post">'
                    . '<div>'
                        . '<p class="username">' . $row['username'] . '</p>'
                        . '<p class="date">' . $row['time'] . '</p>'
                    . '</div>'
                . '</div>'
                . '<p class="detail">' . $row['detail'] . '</p>'
            . '</div>';
    };
?>