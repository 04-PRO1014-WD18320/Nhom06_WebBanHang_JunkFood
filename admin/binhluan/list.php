<div class="row">
    <div class="row formtitle">
        <h1>Danh Sach Binh Luan</h1>
    </div>
    <div class="row formcontent">
        <div class="row mb10 fromdsloai">
            <table>
                <tr>
                    <th></th>
                    <th>ID</th>
                    <th>Noi Dung</th>
                    <th>Iduser</th>
                    <th>idsanpham</th>
                    <th>Ngay Binh Luan</th>
                    <th></th>
                </tr>
                <?php
                    foreach($listbinhluan as $binhluan){
                        extract($binhluan);
                        
                        $xoabl="index.php?act=xoabl&id=".$id;

                        echo '<tr>
                                <td><input type="checkbox" name="" id=""></td>
                                <td>'.$id.'</td>
                                <td>'.$noidung.'</td>
                                <td>'.$iduser.'</td>
                                <td>'.$idsanpham.'</td>
                                <td>'.$ngaybinhluan.'</td>
                                <td><a href="'.$xoabl.'"><input type="button" value="Xóa"></a></td>
                                </tr>';
                    }
                ?>
            </table>
        </div>
        <!-- <div class="row mb10">
            <input type="button" value="Chon tat ca">
            <input type="button" value="Bo chon tat ca">
            <input type="button" value="Xoa cac muc da chon">
        </div> -->
    </div>
</div>