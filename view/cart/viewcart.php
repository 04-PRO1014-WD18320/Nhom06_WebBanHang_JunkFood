<div class="row mb content3 boxtrai ">
    <div class=" ">
        <div class="row mb  ">
            <div class="boxtitle  ">GIỎ HÀNG</div>
            <div class="row boxcontent  formtable ">
    <table>  
    <tr>

                <th>Hình</th>
                <th>Sản phẩm</th>
                <th>Đơn giá</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
                <th>Thao tác</th>
            </tr>
            <?php
          foreach($listgiohang as $load){
            extract($load);
          if(isset($_SESSION['user']['id'])){
                $tong=0;
                $hinh = "upload/".$img;
                $ttien=$soluong * $price ;
                $tong+=$ttien;
                }   
            ?>
                <tr>
                <td><img src="<?=$hinh?>" alt="" height="80px"></td>
                <td><?=$name?></td>
                <td><?=$price?></td>
                <td><?=$soluong?></td>
                <td><?=$ttien?></td>
                <td> <a href="index.php?act=xoagiohang&idgiohang=<?=$id?> "onclick="return confirm('Bạn muốn xóa sản phẩm này?')">   Xóa  </a></td>
                </tr>
                ';
                <?php
          }
          ?>
    </table>
   
            </div>
        </div>
        <div class="row mb10 formcontent">
               <a href="index.php?act=bill"> <input type="button" value="TIẾP TỤC ĐẶT HÀNG"></a>
               <a href="index.php?act=xoagiohang1"> <input name="xoagiohang1" type="button" value="XÓA GIỎ HÀNG"></a>
                </div>
    </div>
</div>
