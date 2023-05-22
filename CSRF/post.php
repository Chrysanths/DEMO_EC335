<?php
    include("connect.php");

    session_start();
    
    $username = $_SESSION['username'];
    $detail = $_POST['detail'];

    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $time =  date("d M, Y H:i");
    
    // Xác thực token trong quá trình xử lý yêu cầu
    if (isset($_POST['csrf_token']) == false) {
        // Token không khớp, từ chối yêu cầu
        die('Invalid token');
    }
    else if ($_POST['csrf_token'] !== $_SESSION['csrf_token'] or isset($_POST['csrf_token']) == false) {
        // Token không khớp, từ chối yêu cầu
        die('Invalid token');
    }
    // Token hợp lệ, tiếp tục xử lý yêu cầu
    
    if($detail != "")
    {
        $sql = "insert into posts values('','" .  $username . "', '" . $detail . "','" . $time . "')";

        if ($conn->query($sql) === TRUE) {
            header('Location: blog.php');
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    else
        header('Location: blog.php');
?>