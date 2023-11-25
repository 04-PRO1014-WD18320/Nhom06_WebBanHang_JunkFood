<?php
extract($listspct);
$hinh = "upload/" . $img;
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
        </div>
    </div>
            </div>
            <form action="">
            <div class="btcart mt10">
                <input type="button" value="Thêm vào giỏ hàng">
                <input type="button" value="Mua ngay">
            </div>
            </form>
            
        </div>';
?>
<div class="formbl mt10">
    <h3>Bình luận</h3>
    <hr>
</div>
<div class="samesp mt10">
    <h3>Sản phẩm tương tự</h3>
    <hr>

    <div class="boxspfisst mt">

        <?php
        foreach ($spcl as $sp) {
            extract($sp);
            $hinh = "upload/" . $img;
            $linksp = "index.php?act=sanphamchitiet&idsp=" . $id;
            echo '
<div class="boxsp mt">
<a href="' . $linksp . '"><img src="' . $hinh . '" width="100%" height="150px" alt=""></a>

<div class="namesp">
<a href="' . $linksp . '">' . $name . '</a>
</div>
<div class="pricesp">
<p> ' . $price . '</p>
</div>
<form action="">
<div class="muasp">
<input type="hidden" name="id" value="' . $id . '">
<input type="hidden" name="name" value="' . $name . '">
<input type="hidden" name="img" value="' . $img . '">
<input type="hidden" name="price" value="' . $price . '">
<input type="button" name="addtocard" value="Mua ngay">
</div>
</form>
</div>
';
        }
        ?>
    </div>

</div>
<script>
    let element = document.getElementById("amount");
    let amount = Number(element.value);
    let element2 = document.getElementById("soluong");
    let soluong = Number(element2.value);
    console.log(amount);
    console.log(soluong);

    let render = (amount1) => {
        element.value = amount1;
        console.log("amount1", amount1);
    }
    let handelplus = () => {
        console.log("handelplus");
        if (amount<soluong) {
            amount = amount + 1;
            console.log("amount", amount);
            render(amount);
        }
        
    }
    let handelminus = () => {
        if (amount>1)
        amount--;
        render(amount);
    }
    // element.addEventListener('input', () => {
    //     amount = element.value;
    //     amount = parseInt(amount);
    //     amount = (isNaN(amount) || amount == 0) ? 1 : amount;
    //     render(amount);
    // });
</script>