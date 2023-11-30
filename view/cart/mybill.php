<div class="boxmybill">
<div class="row mb content3 boxtrai mr  ">
    <div class=" mr ">
        <div class="row mb formtk ">
            <div class="boxtitle mb "><h2>Thông tin khách hàng</h2> </div>
            <div class="row boxcontent  ">
                <form action="index.php?act=mybill" method="post">
                    <div class="row mb50">
                        <strong> Họ và tên<br></strong>
                        <input type="text" name="name">
                    </div>
                    <div class="row mb50">
                        <strong>Số điện thoại  <br></strong>
                        <input type="text" name="tel">
                    </div>
                    <div class="row mb50">
                       <strong> Địa chỉ <br></strong>
                        <input type="text" name="address">
                    </div>
                    <div class="row mb50">
                        <strong>Ghi chú <br></strong>
                       <textarea name="note" id="" cols="30" rows="10">

                       </textarea>
                    </div>

              
               <h2 class="thongbao">
               
               </h2>
            </div>
        </div>
    </div>
</div>
<div class="boxoder formtk1  ">
<div class="boxtitle  "><h2>Đơn hàng</h2> </div>
    <table >
       
        <tr class="mr"> 
            <th>Tên sản phẩm </th>
        <th>Thành tiền</th>
    </tr>
    <?php
    $tong=0;
    foreach($listgiohang as $load){
            extract($load);
            $ttien=$soluong*$price ;
            $tong=$tong+$ttien;
          if(isset($_SESSION['user']['id'])){
            ?>
        <tr class="mr">
            <td><?=$name?></td>
            <td><?=number_format($ttien)."VNĐ"?></td>
        </tr>
        
        <?php
  }
}

        ?>
         <tr class="mr ">
            <td><h5>Tổng tiền</h5></td>
            <td><?=number_format($tong)."VNĐ"?></td>
        </tr>

    
    </table>
    <div class="row mb10 dathang">
       
    <input type="submit" value="Đặt hàng" name="dathang">
                    </div>
    
        
</div>
</div>
</form>