<?php
echo "<h1>Đơn Hàng</h1>";
extract($listspct);
extract($l);
$hinh = "upload/" . $img;
// $linkdh="index.php?act=donhang&idsp=".$id;
echo '
    <div class="spct">
    <div class="img">
    <img src="' . $hinh . '" width="300px" height="300px" alt="">
            </div>
            <div class="contentsp mt10">
                <h1>' . $name . '</h1>
                <div class="pricesp mt10">
                <p>' . $price . '</p>
                </div>
                <div class="motasp mt10">
                <p>' . $mota . '</p>
                </div>
               
                <div id="tanggiam">
        <div class="sl mr">
            <p>Số lượng</p>
        </div>
        <button class="minus" onclick="handelminus()"><i class="fa-solid fa-minus"></i></button>
        <input type="text" name="amount" id="amount" value="1">
        <button class="plus mr" onclick="handelplus()"><i class="fa-solid fa-plus "></i></button>
        <div class="slsp">
        <input type="text" id="soluong" value="' . $soluong . '" placeholder="sản phẩm" disabled>

        <br>
        </div>
        <br>

    </div>
    <div class="thanhtoan">
    <p>Thành Tiền : ' . $price . ' VND</p>
    <input type="radio" id="option1" name="options">
    <label for="option1">thanh toán trực tiếp</label>
    
    <input type="radio" id="option2" name="options">
    <label for="option2">thanh toán online</label><br>
    

    </div>
             </div>
            <form action="">
             <div class="btcart mt10">

                 <input type="button" value="Đặt Hàng" name="dathang">
             
             </div>
            </form>
            
     </div>';
