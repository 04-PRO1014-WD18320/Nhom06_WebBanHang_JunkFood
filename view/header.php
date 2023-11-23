<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="./icons/fontawesome-free-6.4.2-web/js/all.min.js"></script>
    <link rel="stylesheet" href="./longcss/styles.css">
    <link rel="stylesheet" href="./css/du.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="logo">
                <img src="./images/logo.jpg" width="80" height="80" alt="">
            </div>
            <div class="chek">
                <?php
                    if(isset($_SESSION['user'])) :
                    extract($_SESSION['user']);
                ?>
                    <div class="user">
                                <a href="#">Xin Chao</a>  <?=$user?>
                            </div>
                    <li><a href="../admin/">
                <?php
                    if($role == 1){
                        echo 'toi trang quan tri';
                    }
                ?>
                    </a>
                </li>
                <li class="dangxuat"><a href="index.php?act=thoat">Dang xuat</a></li>
                <?php endif?>
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
                <div class="input">
                    <input type="text" value="search">
                </div>
                <div class="iconsearch">
                    <a href=""><i class="fa-solid fa-magnifying-glass"></i></a>
                </div>
            </div>
            <div class="icons">
                <?php
                if(isset($_SESSION['username'])&&($_SESSION['username']!="")){
                    echo '<a href="index.php?act=userinfo">'.$_SESSION['username'].'</a>';
                    echo '<a href="index.php?act=thoat">thoat</a>';
                }else{
                
                ?>
                <a href="view/login/dangnhap.php"><i class="fa-solid fa-user"></i></a>
                <?php }?>
                <a href="#"><i class="fa-solid fa-cart-shopping"></i></a>
            </div>
        </div>
        <div class="banner mt">
            <div class="banner">
                <!-- Slideshow container -->
                <div class="slideshow-container">

                <!-- Full-width images with number and caption text -->
                <div class="mySlides fade">
                <div class="numbertext">1 / 3</div>
                <img src="./images/doanvat1.jpg"  height="400px">
                <div class="text">Caption Text</div>
                </div>

                <div class="mySlides fade">
                <div class="numbertext">2 / 3</div>
                <img src="./images/doanvat2.jpg"   height="400px">
                <div class="text">Caption Two</div>
                </div>

                <div class="mySlides fade">
                <div class="numbertext">3 / 3</div>
                <img src="./images/doanvat3.jpg"   height="400px">
                <div class="text">Caption Three</div>
                </div>

                <!-- Next and previous buttons -->
                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>
                </div>
                <br>

                <!-- The dots/circles -->
                <div style="text-align:center">
                <span class="dot" onclick="currentSlide(1)"></span>
                <span class="dot" onclick="currentSlide(2)"></span>
                <span class="dot" onclick="currentSlide(3)"></span>
                </div>
            </div>
            <script>
                let slideIndex = 1;
            showSlides(slideIndex);
            
            // Next/previous controls
            function plusSlides(n) {
              showSlides(slideIndex += n);
            }
            
            // Thumbnail image controls
            function currentSlide(n) {
              showSlides(slideIndex = n);
            }
            
            function showSlides(n) {
                let slideIndex = 0;
                showSlides();
            
                function showSlides() {
                let i;
                let slides = document.getElementsByClassName("mySlides");
                for (i = 0; i < slides.length; i++) {
                    slides[i].style.display = "none";
                }
                slideIndex++;
                if (slideIndex > slides.length) {slideIndex = 1}
                slides[slideIndex-1].style.display = "block";
                setTimeout(showSlides, 2000); // Change image every 2 seconds
                }
            }
            </script>
        </div>