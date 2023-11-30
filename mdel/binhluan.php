<?php
    function insert_binhluan($noidung,$iduser,$idpro,$ngaybinhluan){
        $sql="insert into binhluan(noidung,iduser,idsanpham,ngaybinhluan) values('$noidung','$iduser','$idpro','$ngaybinhluan')";
        pdo_execute($sql);
    }
    function loadall_binhluan($idpro){
        $sql="select * from binhluan where 1";
        if($idpro>0) $sql.=" AND idsanpham='".$idpro."'";
        $sql.=" order by id desc";
        $listbl=pdo_query($sql);
        return $listbl;
    }
    function delete_bl($id){
        $sql = "DELETE FROM binhluan where id=".$id;
        $taikhoan=pdo_execute($sql);
        return $taikhoan;
    }
?>