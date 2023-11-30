<div class="row">
    <div class="row formtitle">
        <h1>Thong Ke San Pham Theo Loai</h1>
    </div>
    <div class="row formcontent">
        <div class="row mb10 fromdsloai">
            <table>
                <tr>
                    <th>Ma Danh Muc</th>
                    <th>Ten Danh Muc</th>
                    <th>So Luong</th>
                    <th>Gia Cao Nhat</th>
                    <th>Gia Thap Nhat</th>
                    <th>Gia Trung Binh</th>
                </tr>
                <?php
                    foreach($listthongke as $thongke){
                        extract($thongke);
                        echo '<tr>
                                <td>'.$madm.'</td>
                                <td>'.$tendm.'</td>
                                <td>'.$countsp.'</td>
                                <td>'.$maxprice.'</td>
                                <td>'.$minprice.'</td>
                                <td>'.$avgprice.'</td>
                                </tr>';
                    }
                ?>
            </table>
        </div>
        <div class="row mb10">
            <a href="index.php?act=bieudo"><input type="button" value="Xem Bieu Do"></a>
        </div>
    </div>
</div>