<?php
session_start();
ob_start();
include "view/header.php";
include "mdel/pdo.php";
include "mdel/danhmuc.php";
include "mdel/sanpham.php";
include "mdel/taikhoan.php";

if ((isset($_GET['act'])) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
        case 'dangky':
            if(isset($_POST['dangky'])&&($_POST['dangky'])){
                $email=$_POST['email'];
                $user=$_POST['user'];
                $pass=$_POST['pass'];
                $tel=$_POST['tel'];
                $address=$_POST['address'];
                insert_taikhoan($email,$user,$pass,$tel,$address); 
            }
            $thongbao="Đăng Ký Thành Công";
            // include "view/login/dangky.php";
            break;
        case 'dangnhap':
            if(isset($_POST['dangnhap'])&&($_POST['dangnhap'])){
                $user=$_POST['user'];
                $pass=$_POST['pass'];
                $checkuser=checkuser($user,$pass);
                if(is_array($checkuser)){
                    $_SESSION['user']=$checkuser;
                    // header('Location: index.php');
                }else{
                    $thongbao="tai khoan ko ton tai vui long kiem tra hoac dang ky";
                }
            }
            // include "view/login/dangky.php";
            break;
        case 'thoat':
                session_unset();
                // header('Location: index.php');
                // include_once "index.php";
                break;
        default:
            include "view/home.php";
            break;
    }
} else {
    include "view/home.php";
}
include "view/footer.php";
?>