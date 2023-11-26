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
        <h1>Danh Sach Don Hang</h1>
    </div>
    <div class="row fromcontent">
        <div class="row mb10 fromdsloai">
            <table>
                <tr>
                        <th>Tên Người Nhận</th>
                        <th>Thành tiền</th>
                        <th>Thời Gian</th>
                        <th>Phương thức Thanh Toán</th>
                        <th>Trạng Thái Đơn hàng</th>
                        <th>Thao tác</th>
                </tr>
                <?php
                    if (!empty($list_cart)) {
                        foreach ($list_cart as $cart) {
                            extract($cart);
                    ?>
                            <tr>
                                <td><?= $code ?></td>
                                <td><?= get_user_by_id($user_id)['user'] ?></td>
                                <td><?= number_format($price_all) ?></td>
                                <td><?= $date_time ?></td>
                                <td><span>
                                        <?php
                                        if ($payment == 0) {
                                            echo "Thanh toán khi nhận hàng";
                                        } else echo 'Chuyển khoản ngân hàng';
                                        ?>
                                    </span></td>
                                <td><span class="status pending">
                                        <?php
                                        if ($role == 0) {
                                            echo 'Chờ xác nhận';
                                        } elseif ($role == 1) {
                                            echo 'Đang xử lí';
                                        } elseif ($role == 2) {
                                            echo 'Đang giao';
                                        } else if ($role == 3) {
                                            echo 'Đã nhận được hàng';
                                        } else if($role == 4) {
                                            echo 'Đã hủy';
                                        } else if($role == 5){
                                            echo 'Yêu cầu hủy đơn';
                                        }
                                        ?>
                                    </span></td>
                                <td>
                                    <a href="index.php?act=edit_cart&id_cart=<?= $cart_id ?>">Sửa</a>
                                </td>
                            </tr>
                    <?php
                        }
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