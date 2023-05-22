<?php
include("connect.php");

session_start();

$stmt = $conn->prepare("select * from accounts where username = ? AND password = ?");
$stmt->bind_param("ss", $_POST['username'], $_POST['password']);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['avt'] = $_POST['username'] . '.jpg';
        header('Location: blog.php');
    }
  } else {
    header('Location: index.html');
};
?>
