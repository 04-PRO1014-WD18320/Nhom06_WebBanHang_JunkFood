
       <div class="row">
       <div class="row mb  ">
            <div class="boxtitle ">GIỎ HÀNG</div>
            <div class="row boxcontent  formtable ">
    <table>  
          <tr>
            <th></th>
           <th>Hình</th>
           <th>Sản phẩm</th>
           <th>Đơn giá</th>
           <th>Số lượng</th>
           <th>Thành tiền</th>
           <th>Thao tác</th>
          
       </tr>
    
       
   
            <?php
             $tong=0;
          foreach($listgiohang as $load){
            extract($load);
          if(isset($_SESSION['user']['id'])){
               
                $hinh = "upload/".$img;
                $ttien=$soluong*$price ;
                $tong=$tong+$ttien;
                }   
            ?>
                <tr>
                <a href="index.php?act=check"><td> <input type="checkbox" name="check" id=""> </td></a>
                <td><img src="<?=$hinh?>" alt="" height="80px"></td>
                <td><?=$name?></td>
                <td><?=number_format($price)."VNĐ"?></td>
                <td><?=$soluong?></td>
                <td><?=number_format($ttien)."VNĐ"?></td>
                <td> <a href="index.php?act=xoagiohang&idgiohang=<?=$id?> "onclick="return confirm('Bạn muốn xóa sản phẩm này?')">   Xóa  </a></td>
                </tr>
                <?php
          }
         
          ?>
          <th colspan=5>Tổng thành tiền</th>
          <td colspan=2><?=number_format($tong)."VNĐ"?></td>
          
    </table>
   
            </div>
        </div>
    <form action="" method="post">
    <div class="row mb10 formcontent">
           <a href="index.php?act=bill"> <input type="button" value="TIẾP TỤC ĐẶT HÀNG"></a>
           <a href="index.php?act=xoagiohang1"> <input name="xoagiohang1" type="button" value="XÓA GIỎ HÀNG"></a>
            </div>
    </form>
        </div>

