<div class="row">
            <div class="row frmtitle">
                <h1>DANH SÁCH LOẠI HÀNG</h1>
            </div>
            <div class="row frmcontent">

                <div class="row mb10 frmdsloai">
                    <table>
                        <tr>
                            <tH></th>
                            <th>MÃ LOẠI</th>
                            <th>TÊN LOẠI</th>
                            <TH></th>
                        </tr>
                        <?php foreach($listdanhmuc as $danhmuc) {
                               extract($danhmuc);
                               $suadm="index.php?act=suadm&id=" .$id;
                               $xoadm="index.php?act=xoadm&id=" .$id;
                               echo ' <tr>
                               <td><input type="checkbox"></td>
                               <td>'.$id.'</td>
                               <td>'.$namedm.'</td>
                               <td> <a href="'.$suadm.'"><input  type="button" value="sửa"></a> <a href="'.$xoadm.'"><input type="button" value="xóa"></a></td>
                           </tr>';
                            }
                            ?>
                       
                    </table>
                </div>
                <div class="row mb10">
                   <input type="button" value="chọn tất cả">
                   <input type="button" value="bỏ chọn tất cả">
                   <input type="button" value="xóa các mục đã chọn">
                   <a href="index.php?act=adddm"><input type="button" value="nhập thêm"></a>
                </div>
            </div>
        </div>