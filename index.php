<?php
session_start();
ob_start();
include "mdel/pdo.php";
include "mdel/danhmuc.php";
include "mdel/sanpham.php";
include "mdel/taikhoan.php";
include "view/header.php";

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
        case "donhang":
                if(isset($_GET["idsp"])&& ($_GET["idsp"])>0){
                    $listspct= loadone_sanpham($_GET["idsp"]);
                    extract($listspct);
                    
                    include "view/donhang.php";
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
        // case 'dangnhap':
        //     if(isset($_POST['dangnhap'])&&($_POST['dangnhap'])){
        //         $user=$_POST['user'];
        //         $pass=$_POST['pass'];
        //         $kq=getuserinfo($user,$pass);
        //         $role=$kq[0]['role'];
        //         if($role==1){
        //             $_SESSION['role']=$role;
        //             header('location: window.admin/index.php');
        //         }else{
        //             $_SESSION['role']=$role;
        //             $_SESSION['iduser']=$kq[0]['id'];
        //             $_SESSION['username']=$kq[0]['user'];
        //             header('location: index.php');
        //             break;
        //         }
        //     }
        case 'dangnhap':
                if(isset($_POST['dangnhap'])&&($_POST['dangnhap'])){
                    $user=$_POST['user'];
                    $pass=$_POST['pass'];
                    $checkuser=checkuser($user,$pass);
                    if(is_array($checkuser)){
                        $_SESSION['user']=$checkuser;
                        header('Location: index.php');
                    }else{
                        $thongbao="tai khoan ko ton tai vui long kiem tra hoac dang ky";
                        header('Location: view/login/dangnhap.php');
                    }
                }
                
                // include "view/login/dangky.php";
                break;
        case 'quenmk':
                if(isset($_POST['guiemail'])&&($_POST['guiemail'])){
                    $email=$_POST['email'];

                    $checkemail=checkemail($email);
                    if(is_array($checkemail)){
                        $thongbao="Mat Khau Cua Ban la: ".$checkemail['pass'];
                    }else{
                        $thongbao="email nay ko ton tai";
                    }
                }
                include "view/login/quenmk.php";
                break;
        case 'edit_taikhoan':
                if(isset($_POST['capnhat'])&&($_POST['capnhat'])){
                    $user=$_POST['user'];
                    $pass=$_POST['pass'];
                    $email=$_POST['email'];
                    $address=$_POST['address'];
                    $tel=$_POST['tel'];
                    $id=$_POST['id'];

                    update_taikhoan($id,$user,$pass,$email,$address,$tel);
                    $_SESSION['user']=checkuser($user,$pass);
                    header('Location: index.php?act=edit_taikhoan');
                }
                include "view/login/edit_taikhoan.php";
                break;
        case 'thoat':
            unset($_SESSION['user']);
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