<?php
if (!isset($_SESSION)) {
    session_start();
} else {
    session_destroy();
    session_start();
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/blog.js"></script>
    <title>Mạng xã hội</title>
</head>

<body>
    <div class="header">
        <p class="title">MẠNG XÃ HỘI GENZ</p>
        <div class="right">
            <p class="acc"><?php echo 'User: ' . $_SESSION['username'] ?></p>
            <button id="btn-logout" class="btn">Đăng xuất</button>
        </div>
    </div>
    <div class="header-virtual"></div>

    <div class="body">
        <div class="container_profile">
            <div class="profile shadow-radius">
                <img src="<?php echo 'image/' . $_SESSION['avt'] ?>" class="avt_profile">
                <p class="username_profile"><?php echo $_SESSION['username'] ?></p>
                <p><?php
                    date_default_timezone_set('Asia/Ho_Chi_Minh');
                    echo date("d M, Y H:i")
                    ?>
                    <?php
                    $token = bin2hex(random_bytes(16)); // Generate a 32-byte random string and convert it to a hexadecimal string
                    $_SESSION['csrf_token'] = $token;
                    echo $_SESSION['csrf_token']; // Output the token
                    ?>
                </p>
            </div>
        </div>
        <div class="container_post">
            <div class="post shadow-radius">
                <div class="ctn_avt_content">
                    <img src="<?php echo 'image/' . $_SESSION['avt'] ?>" class="avt_post">

                    <form action="post.php" method="post" class="container_btn">
                        <!-- token here  -->
                        <input type="hidden" name="csrf_token" value="<?php echo $token?>">

                        <input type="text" autocomplete="off" size="18" id="post_content" name="detail" placeholder="Bạn đang nghĩ gì?">
                        <input type="submit" class="btn-post" id="btn-post" value="Đăng">
                    </form>
                </div>
            </div>

            <div class="container-list-post">
                <?php include("loadlistblog.php") ?>
            </div>
        </div>

    </div>
</body>

</html>