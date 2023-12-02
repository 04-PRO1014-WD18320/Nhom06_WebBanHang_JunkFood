<?php
    if(isset($_SESSION['user'])){
        extract($_SESSION['user']);
?>
    <?php
    if($role==1){
        header('location: admin/index.php');
        ?>
        <?php
            }else{
        ?>
   
   <?php }?>  
    <?php } ?>

<div class="banner mt">
            <div class="banner">
                <!-- Slideshow container -->
                <div class="slideshow-container">

                <!-- Full-width images with number and caption text -->
                <div class="mySlides fade">
                <div class="numbertext">1 / 3</div>
                <img src="./images/bannerdokhohhh.jpg" width="100%" height="400px">
                <div class="text">Caption Text</div>
                </div>

                <div class="mySlides fade">
                <div class="numbertext">2 / 3</div>
                <img src="./images/doanvat2.jpg" width="100%"  height="400px">
                <div class="text">Caption Two</div>
                </div>

                <div class="mySlides fade">
                <div class="numbertext">3 / 3</div>
                <img src="./images/bannerdokhokkk.jpg"  width="100%"  height="400px">
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

<div class="allboxsp ">
    
    <div class="iconshow mt">
        <a href="">
        <h1>Một số sản phẩm bán chạy</h1>
        </a>
    </div>
    <div class="boxspfisst mt">

        <?php
    foreach($listspmin as $min){
        extract($min);
        $hinh="upload/".$img;
    $linksp="index.php?act=sanphamchitiet&idsp=".$id;
    echo '
    <div class="boxsp ">
    <a href="'.$linksp.'"><img src="'.$hinh.'" width="100%" height="150px" alt=""></a>

    <div class="namesp">
    <a href="'.$linksp.'">'.$name.'</a>
    </div>
    <div class="pricesp">
     <p> '.number_format($price)."VNĐ".'</p>
    </div>
    <form action="">
    <div class="muasp">
    <input type="hidden" name="id" value="'.$id.'">
    <input type="hidden" name="name" value="'.$name.'">
    <input type="hidden" name="img" value="'.$img.'">
    <input type="hidden" name="price" value="'.$price.'">
    <input type="submit" name="addtocard" value="Mua ngay">
</div>
    </form>
    </div>
    ';
    }
    ?>
        </div>
    </div>
    <div class="allboxsp mt">
        <div class="iconshow mt">
            <a href="">
                <h1>Xem tất cả sản phẩm</h1>
                </h1>
            </a>
        </div>
        <div class="boxspfisst mt">
        <?php
    foreach($listsp as $list){
        extract($list);
        $hinh="upload/".$img;
    $linksp="index.php?act=sanphamchitiet&idsp=".$id;
    echo '
    <div class="boxsp mt ">
    <a href="'.$linksp.'"><img src="'.$hinh.'" width="100%" height="150px" alt=""></a>

    <div class="namesp">
    <a href="'.$linksp.'">'.$name.'</a>
    </div>

    <div class="pricesp">
     <p> '.number_format($price)."VNĐ".'</p>
    </div>
    <form action="">
    <div class="muasp">
    <input type="hidden" name="id" value="'.$id.'">
    <input type="hidden" name="name" value="'.$name.'">
    <input type="hidden" name="img" value="'.$img.'">
    <input type="hidden" name="price" value="'.$price.'">
    <input type="submit" name="addtocard" value="Mua ngay">
</div>
    </form>

    </div>
    ';
    }
    ?>




        </div>

    </div>
   