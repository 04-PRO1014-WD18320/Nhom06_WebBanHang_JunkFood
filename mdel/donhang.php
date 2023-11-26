<?php
    include_once 'pdo.php';

function cart_insert($phone,$add,$user_id,$price_all,$note,$ngaydathang,$payment)
{
    $sql = "insert into donhang(tel,address,iduser,price_all,note,ngaydathang,payment) value (?,?,?,?,?,?,?)";
    pdo_execute($sql,$phone,$add, $user_id, $price_all, $note, $ngaydathang, $payment);
}
function get_all_cart(){
    $sql = "select * from donhang order by ngaydathang desc";
    return pdo_query($sql);
}
function get_bill_by_user($user_id){
    $sql = "select * from donhang where iduser = ? order by ngaydathang desc";
    return pdo_query($sql,$user_id);
}
// function get_cartdetail_by_code($code){
//     $sql = "select * from cart_detail where code = ?";
//     return pdo_query($sql,$code);
// }
function get_cart_by_id($cart_id){
    $sql = "select * from donhang where id_donhang = ?";
    return pdo_query_one($sql,$cart_id);
}
function update_cart($role,$cart_id){
    $sql = "update donhang set role =? where id_donhang = ?";
    return pdo_execute($sql,$role,$cart_id);
}
function get_id_cart_by_user_id($user_id){
    $sql = "select id_donhang from donhang where iduser = ?";
    return pdo_query_value($sql,$user_id);
}
// function getCartDetailId($cart_id,$product_id){
//     $sql = "select cart_detail_id from cart_detail where cart_id = ? and product_id = ?";
//     return pdo_query_value($sql,$cart_id,$product_id);
// }
// function createCartDetail($product_id,$code,$quantity,$total_price){
//     $sql = "insert into cart_detail(product_id,code,quantity,total_price) value(?,?,?,?)";
//     pdo_execute($sql,$product_id, $code, $quantity, $total_price);
// }
// function updateCartDetail($cart_detail_id,$quantity){
//     $sql = "update cart_detail set quantity= ? where cart_detail_id = ?";
//     pdo_execute($sql,$quantity,$cart_detail_id);
// }

?>