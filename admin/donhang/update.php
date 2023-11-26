<?php
if (is_array($cart)) {
    extract($cart);
}
?>
<div class="row">
    <div class="row frmtitle">
        <h1>CẬP NHẬT ĐƠN HÀNG </h1>
    </div>
    <div class="row frmcontent">
        <form action="index.php?act=updatesp" method="post" enctype="multipart/form-data">
            <div class="row mb10">
                Người Đặt <br>
                <input type="text" name="user" placeholder="Mã sản phẩm" value="<?= get_user_by_id($user_id)['user'] ?>" disabled>
            </div>
            <div class="row mb10">
            Địa chỉ nhận hàng
                <input type="text" name="user" placeholder="Dia Chi Nhan Hang" value="<?= $address ?>" disabled>
            </div>
            <div class="row mb10">
                Ngày đặt
                <input type="text" name="order_date" placeholder="Ngày đặt hàng" value="<?= $ngaydathang ?>" disabled>
            </div>
            <div class="row mb10">
                Thành tiền
                <input type="text" name="total_amount" placeholder="Tổng thành tiền sản phẩm" value="<?= number_format($price_all) ?>" disabled>
            </div>
            <div class="row mb10">
                Phương thức thanh toán
                <input type="text" name="payment" placeholder="Phương thức thanh toán" value="<?php if ($payment == 0) {
                                                                                                                        echo "Thanh toán khi nhận hàng";
                                                                                                                    } else if ($payment == 1) {
                                                                                                                        echo "Chuyển khoản ngân hàng";
                                                                                                                    } else {
                                                                                                                        echo "Không tìm thấy phương thức thanh toán";
                                                                                                                    }  ?>" disabled>
            </div>
            <div class="row mb10">
                Trang Thai
                <select required name="status" id="">
                            <option value="0" <?= $role == 0 ? "selected" : "" ?>>Đơn hàng mới</option>
                            <option value="1" <?= $role == 1 ? "selected" : "" ?>>Đang xử lý</option>
                            <option value="2" <?= $role == 2 ? "selected" : "" ?>>Đang giao hàng</option>
                            <option value="3" <?= $role == 3 ? "selected" : "" ?>>Đã giao hàng</option>
                            <option value="4" <?= $role == 4 ? "selected" : "" ?>>Đã hủy</option>
                            <option value="5" <?= $role == 5 ? "selected" : "" ?>>Yêu cầu hủy</option>
                        </select>
            </div>
            <div class="row mb10">
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <input type="submit" name="capnhat" value="CẬP NHẬT">
                <input type="reset" value="NHẬP LẠI">
            </div>
        </form>
    </div>
    <div class="row">
        <div class="row frmtitle">
            <h1>SẢN PHẨM </h1>
        </div>
    </div>
</div>
</div>
