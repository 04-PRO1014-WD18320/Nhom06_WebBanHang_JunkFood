<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="./icons/fontawesome-free-6.4.2-web/js/all.min.js"></script>
    <link rel="stylesheet" href="./view/longcss/styles.css">
  
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="logo">
                <img src="./images/logo.jpg" width="80" height="80" alt="">
            </div>
            <div class="menu">
                <ul>
                    <li><a href="index.php">Trang chủ</a></li>
                    <li><a href="#">Đồ khô</a></li>
                    <li><a href="#">Trái cây</a></li>
                    <li><a href="#">Đồ uống</a></li>
                    <li><a href="#">Bánh tươi</a></li>
                </ul>
            </div>
            <div class="search">
                <form action="" method="post">
                    <input type="text" placeholder="Search">
                    <a href=""><i class="fa-solid fa-magnifying-glass"></i></a>
            </div>
            <div class="icons">
                <?php
                if (isset($_SESSION['username']) && ($_SESSION['username'] != "")) {
                    echo '<a href="index.php?act=userinfo">' . $_SESSION['username'] . '</a>';
                    echo '<a href="index.php?act=thoat">thoat</a>';
                } else {

                    ?>
                    <a href="view/login/dangnhap.php"><i class="fa-solid fa-user"></i></a>
                <?php } ?>
                <a href="#"><i class="fa-solid fa-cart-shopping"></i></a>
            </div>
            </form>

        </div>
       