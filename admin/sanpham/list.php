<div class="row">
            <div class="row frmtitle mb">
                <h1>DANH SÁCH LOẠI HÀNG</h1>
            </div>
            <form action="index.php?act=lissp" method="post">
                        <input type="text" name="kyw" id="">
                        <select name="iddm" id="">
                               <option value="0" selected>Tất cả</option>
                                <?php foreach($listdanhmuc as $danhmuc) {
                                    extract($danhmuc);
                                    echo ' <option value="'.$id.'">'.$namedm.'</option>';
                                } ?>
                          
                        </select>
                        <input type="submit" name="listok" value="GO">
            </form>
            <div class="row frmcontent">

                <div class="row mb10 frmdsloai">

                    <table>
                        <tr>
                            <tH></th>
                            <th>MÃ SẢN PHẨM</th>
                            <th>TÊN SẢN PHẨM</th>
                            <th> HÌNH</th>
                            <th>GIÁ</th>
                            <th>LƯỢT XEM</th>
                            <th>SỐ LƯỢNG</th>
                        </tr>
                        <?php foreach($listsanpham as $sanpham) {
                               extract($sanpham);

                               $suasp="index.php?act=suasp&id=" .$id;
                               $xoasp="index.php?act=xoasp&id=" .$id;
                               $hinhpath="../upload/".$img;
                               if(is_file($hinhpath)){
                                $hinh=" <img src='".$hinhpath."' height='80'>";
                              
                               }else{
                                $hinh = "no photo";
                               }
                               echo ' <tr>
                               <td><input type="checkbox"></td>
                               <td>'.$id.'</td>
                               <td>'.$name.'</td>
                               <td>'.$hinh.'</td>
                               <td>'.$price.'</td>
                               <td>'.$luotxem.'</td>
                               <td>'.$soluong.'</td>
                               <td> <a href="'.$suasp.'"><input  type="button" value="sửa"></a> <a href="'.$xoasp.'"><input type="button" value="xóa"></a></td>
                           </tr>';
                            }
                            ?>
                       
                    </table>
                </div>
                <div class="row mb10">
                   <input type="button" value="chọn tất cả">
                   <input type="button" value="bỏ chọn tất cả">
                   <input type="button" value="xóa các mục đã chọn">
                   <a href="index.php?act=addsp"><input type="button" value="nhập thêm"></a>
                </div>
            </div>
        </div>