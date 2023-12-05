<?php
if (is_array($sanpham)) {
    extract($sanpham);
}

$hinhpath = "../upload/" . $img;
if (is_file($hinhpath)) {
    $hinh = " <img src='" . $hinhpath . "' height='80'>";
} else {
    $hinh = "no photo";
}
?>
<div class="row">
    <div class="row frmtitle">
        <h1>CẬP NHẬT SẢN PHẨM </h1>
    </div>
    <div class="row frmcontent">
        <form action="index.php?act=updatesp" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <div class="row mb10">
                <select name="iddm" id="">
                    <option value="0" selected>Tất cả</option>
                    <?php
                    foreach ($listdanhmuc as $danhmuc) {
                        extract($danhmuc);
                        if ($iddm == $id) $s = "selected";
                        else $s = "";
                        echo ' <option value="' . $id . '" ' . $s . '>' . $namedm . '</option>';
                    }
                    ?>

                </select>
            </div>
            <div class="row mb10">
                Tên sản phẩm <br>
                <input type="text" name="tensp" id="" value="<?php echo $sanpham["name"]  ?>">
            </div>
            <div class="row mb10">
                Giá <br>
                <input type="text" name="giasp" id="" value="<?php echo  $sanpham["price"] ?>">
            </div>
            <div class="row mb10">
                Hình <br>
                <input type="file" name="hinh" id="">
                <?php echo  $hinh ?>
            </div>
            <div class="row mb10">
                Mô tả <br>
                <textarea name="mota" id="" cols="30" rows="10"><?php echo $sanpham["mota"] ?></textarea>
            </div>
            <div class="row mb10">
                Giá <br>
                <input type="number" name="soluong" id="" value="<?php echo $sanpham["soluong"] ?>">
            </div>

            <div class="row mb10">
                <input type="submit" name="capnhat" value="CẬP NHẬT">
                <input type="reset" value="NHẬP LẠI">
                <a href="index.php?act=lissp"><input type="button" value="DANH SÁCH"></a>

            </div>
            <?php
            if (isset($thongbao) && ($thongbao != ""))
                echo $thongbao
            ?>
        </form>
    </div>
</div>
</div>