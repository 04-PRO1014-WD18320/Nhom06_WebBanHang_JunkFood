<?php 
function insert_sanpham($tensp,$giasp,$hinh,$mota,$iddm,$soluong){
  
    $sql = "insert into sanpham(name,price,img,mota,iddm,soluong) values('$tensp','$giasp','$hinh','$mota','$iddm','$soluong')";
    pdo_execute($sql);
}


function delete_sanpham($id){
    $sql = "delete from sanpham where id=" . $id;
    pdo_query($sql);
}
function loadall_sanpham_home(){
    $sql ="select * from sanpham where 1 order by id desc limit 0,8 ";
    $listsanpham = pdo_query($sql);
    return    $listsanpham;
}
function loadall_sanpham_soluongmin(){
    $sql ="select * FROM sanpham where soluong < 20 order by id desc limit 0,4 ";
    $listsanpham = pdo_query($sql);
    return    $listsanpham;
}
function loadall_sanpham_top10(){
 
    $sql ="select * from sanpham where 1 order by luotxem  desc limit 0,10";
    
   
    $listsanpham = pdo_query($sql);
    return    $listsanpham;
}
function loadall_sanpham($kyw="",$iddm=0){
 
    $sql ="select * from sanpham where 1";
    if($kyw!=""){
        $sql.=" and name like '%".$kyw."%'";
    }
    if($iddm>0){
        $sql.=" and iddm='".$iddm."'";
    }
    $sql.=" order by id desc";
    $listsanpham = pdo_query($sql);
    return    $listsanpham;
}
function loadone_sanpham($id){
    $sql = "select * from sanpham where id =".$id;
    $sp=pdo_query_one($sql);
    return $sp;
}
function load_ten_dm($iddm){
    if($iddm>0){
        $sql = "select * from danhmuc where id =".$iddm;
    
        $dm=pdo_query_one($sql);
        extract($dm);
        return $name;
    } else{
        return "";
    }

}
function load_sanpham_cungloai($id,$iddm){
    $sql = "SELECT * FROM sanpham WHERE iddm = '.$iddm.' AND id <> ".$id;
    // var_dump($sql);die();
    $listsanpham = pdo_query($sql);

    return    $listsanpham;
}


function update_sanpham($iddm,$id,$tensp,$giasp,$mota,$hinh,$soluong){
    if($hinh!="")
        $sql="update sanpham set iddm='".$iddm."', name='".$tensp."', price='".$giasp."', mota='".$mota."', img='".$hinh."' where id=".$id;
    else
        $sql="update sanpham set iddm='".$iddm."', name='".$tensp."', price='".$giasp."', mota='".$mota."' where id=".$id;
    pdo_execute($sql);
}
function loadone_ten_dm($iddm){
    if($iddm>0){
    $sql="select * from danhmuc where id=".$iddm;
    $dm=pdo_query_one($sql);
    extract($dm);
    return $name;
    }else{
        return "";
    }
}
?>