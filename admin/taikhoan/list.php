<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>
<body>
    
<div class="row">
    <div class="row fromtitle">
        <h1>Danh Sach Tai Khoan</h1>
    </div>
    <div class="row fromcontent">
        <div class="row mb10 fromdsloai">
            <table>
                <tr>
                    <th></th>
                    <th>Ma TK</th>
                    <th>Ten Dang Nhap</th>
                    <th>Mat Khau</th>
                    <th>Email</th>
                    <th>Dia Chi</th>
                    <th>Dien Thoai</th>
                    <th>Vai Tro</th>
                    <th></th>
                </tr>
                <?php
                    foreach($listtaikhoan as $taikhoan){
                        extract($taikhoan);
                        
                        $xoatk="index.php?act=xoatk&id=".$id;
                        $suatk="index.php?act=suatk&id=".$id;

                        echo '<tr>
                                <td><input type="checkbox" name="" id=""></td>
                                <td>'.$id.'</td>
                                <td>'.$user.'</td>
                                <td>'.$pass.'</td>
                                <td>'.$email.'</td>
                                <td>'.$address.'</td>
                                <td>'.$tel.'</td>
                                <td>'.$role.'</td>
                                <td>
                                <a href="'.$xoatk.'"><input type="button" value="Xóa"></a> 
                                </td>
                                
                                </tr>';
                    }
                ?>
            </table>
        </div>
        <!-- <div class="row mb10">
            <input type="button" value="Chon tat ca">
            <input type="button" value="Bo chon tat ca">
            <input type="button" value="Xoa cac muc da chon">
            <a href="index.php?act=adddm"><input type="button" value="Nhap Them"></a>
        </div> -->
    </div>
</div>
</body>
</html>