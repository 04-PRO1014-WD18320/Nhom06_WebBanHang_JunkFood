<?php 
function insert_danhmuc($namedm){
  
    $sql = "insert into danhmuc(namedm) values('$namedm')";
    pdo_execute($sql);
}

function delete_danhmuc($id){
    $sql = "delete from danhmuc where id=" . $id;
    pdo_query($sql);

}
function loadall_danhmuc(){
    $sql = "select * from danhmuc order by id desc";
    $listdanhmuc = pdo_query($sql);
    return $listdanhmuc;
}
function loadone_danhmuc($id){
    $sql = "select * from danhmuc where id =".$id;
    $dm=pdo_query_one($sql);
    return $dm;
}
function update_danhmuc($id,$namedm){
    $sql = "update danhmuc set namedm='".$namedm."' where id=".$id;
                pdo_execute($sql);
}
function renderAD($path, $data = [])
{
    extract($data);
    $view = "../admin/" . $path . ".php";
    include_once $view;
}
function loadall_thongke(){
    $sql="select danhmuc.id as madm, danhmuc.namedm as tendm, count(sanpham.id) as countsp, min(sanpham.price) as minprice, max(sanpham.price) as maxprice, avg(sanpham.price) as avgprice";
    $sql.=" from sanpham left join danhmuc on danhmuc.id=sanpham.iddm";
    $sql.=" group by danhmuc.id order by danhmuc.id desc";
    $listtk=pdo_query($sql);
    return $listtk;
}
?>