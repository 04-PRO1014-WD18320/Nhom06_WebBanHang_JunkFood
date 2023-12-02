<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="./icons/fontawesome-free-6.4.2-web/js/all.min.js"></script>
    <link rel="stylesheet" href="view/longcss/styles.css">

    <link rel="stylesheet" href="./css/du.css">
    <link rel="stylesheet" href="./css/style.css">
    <style>
        .boxsp p a{
            text-decoration: none;
            color: black;
        }
        .boxtile{
            margin-bottom: 10px;
        }
        .icons a{
            text-decoration: none;
            color: black;
        }
        .mr1{
            margin-right: 20px;
        }
    </style>

</head>

<body>
    <div class="container">
        <div class="header">
            <div class="logo">
               <a href="index.php"> <img src="./images/logo.jpg" width="80" height="80" alt=""></a>
            </div>
            <div class="menu">
                <ul>
                    <li><a href="index.php">Trang chủ</a></li>
                    <li><a href="#">Giới thiệu</a></li>
                    <li><a href="#">Liên hệ</a></li>
                    <li><a href="#">Tư vấn</a></li>
                    <li><a href="#">Bánh tươi</a></li>
                </ul>
            </div>
            <div class="search">
                <form action="index.php?act=sanpham" method="post">
                    <input type="text" placeholder="Search" name="kyw">
                    <input type="submit" name="timkiem" value="   "><i class="fa-solid fa-magnifying-glass timkiem"></i>
                    <a href=""></a>
                </form>
            </div>
            <div class="icons">
                <?php
                if(isset($_SESSION['user'])){
                    extract($_SESSION['user']);
                    echo '  <a href="view/login/edit_taikhoan.php"><a href="index.php?act=edit_taikhoan">'.$user.'</a></a>
                    <a href="index.php?act=thoat">Đăng Xuất</a>';
                    
                } else {

                    ?>
                    <a href="view/login/dangnhap.php"><i class="fa-solid fa-user"></i></a>
                <?php } ?>
                <a href="index.php?act=giohang"><i class="fa-solid fa-cart-shopping"></i></a>
            </div>
            

        </div>
        <div class="banner mt">

        </div>