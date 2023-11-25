<?php
session_start();
include "view/header.php";
ob_start();
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
                $kq=getuserinfo($user,$pass);
                $role=$kq[0]['role'];
                if($role==1){
                    $_SESSION['role']=$role;
                    header('location: admin/index.php');
                }else{
                    $_SESSION['role']=$role;
                    $_SESSION['iduser']=$kq[0]['id'];
                    $_SESSION['username']=$kq[0]['user'];
                    header('location: index.php');
                    break;
                }
            }
        case 'thoat':
                unset($_SESSION['role']);
                unset($_SESSION['iduser']);
                unset($_SESSION['username']);
                header('Location: index.php');
                // include_once "index.php";
                break;
        default:
            break;
    }
} else {
    include "view/home.php";
}
include "view/footer.php";
?>