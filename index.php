<?php
session_start();
include "view/header.php";
include "mdel/pdo.php";
include "mdel/danhmuc.php";
include "mdel/sanpham.php";
include "mdel/taikhoan.php";
$listsp=loadall_sanpham_home();
$listspmin=loadall_sanpham_soluongmin();
if ((isset($_GET['act'])) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
        case "sanphamchitiet":
            if(isset($_GET["idsp"])&& ($_GET["idsp"])>0){
                $listspct= loadone_sanpham($_GET["idsp"]);
                extract($listspct);
                $spcl=load_sanpham_cungloai($id,$iddm);
                include "view/chitietsanpham.php";
            }else{
                echo "Lỗi to đùng";
                include "view/home.php";
            }
            break;

        default:
            break;
    }
} else {
    include "view/home.php";
}
include "view/footer.php";
?>