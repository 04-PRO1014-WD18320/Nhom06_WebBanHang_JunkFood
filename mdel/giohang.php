<?php
function insert_giohang($soluong, $iduser, $idsp) {
    $sql = "INSERT INTO giohang(soluong, iduser, idsanpham) VALUES (?, ?, ?) ";
    pdo_execute($sql, $soluong, $iduser, $idsp);
}

function check_giohang($iduser, $idsp) {
    $sql = "SELECT * FROM giohang WHERE idsanpham = ? AND iduser = ?";
    return pdo_query_one($sql, $idsp, $iduser);
}

function check_giohang1($iduser, $idsp) {
    $sql = "SELECT * FROM giohang WHERE idsanpham = ? AND iduser = ?";
    return pdo_query_one($sql, $idsp, $iduser);
}
function delete_giohang($id){
    $sql = "delete from giohang where id=".$id;
    pdo_query($sql);
}
function update_giohang($soluong, $id) {
    $sql = "UPDATE giohang SET soluong = ? WHERE id = ?";
    var_dump($soluong, $id);
    pdo_execute($sql, $soluong, $id);
}
function loadall_giohang($id){
    $sql = "SELECT giohang.id, giohang.soluong, sanpham.name,  sanpham.price, sanpham.img
    FROM giohang
    JOIN sanpham ON giohang.idsanpham= sanpham.id
    WHERE giohang.iduser = $id";
    $giohang = pdo_query($sql);
    return $giohang; 
}
