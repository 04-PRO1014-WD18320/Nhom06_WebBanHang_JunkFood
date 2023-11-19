<?php
    session_start();
    include "mdel/pdo.php";
    include "mdel/danhmuc.php";
    include "mdel/sanpham.php";
    include "mdel/taikhoan.php";
    
    if((isset($_GET['act']))&&($_GET['act']!="")){
        $act=$_GET['act'];
        switch ($act) {
            case 'lienhe':
                include "view/home.php";
                break;
            default:
                include "view/home.php";
                break;
            }
        }else{
            include "view/home.php";
        }
    include "view/footer.php";
?>