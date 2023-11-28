<?php
session_start();
include "view/header.php";
ob_start();
include "mdel/pdo.php";
include "mdel/danhmuc.php";
include "mdel/sanpham.php";
include "mdel/taikhoan.php";
include "mdel/cart.php";
include "mdel/giohang.php";
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
        case 'thoat':
               unset($_SESSION['user']);
                header('Location: index.php');
                include_once "index.php";
                break;
                case 'addtocart':
                    $idsp = isset($_GET['idsp']) ? $_GET['idsp'] : null;
                    if (isset($_SESSION['user']['id'])) {
                        $userid = $_SESSION['user']['id'];
                        if (isset($_POST['addtocart'])) {
                            $check = check_giohang($idsp, $userid);
                            $soluong = isset($_POST['amount']) ? intval($_POST['amount']) : 1;
                            if (!empty($check) && is_array($check)) {
                                $soluong = $soluong + $check['soluong'];
                                update_giohang($soluong, $check['id']);
                            } else {
                                insert_giohang($soluong, $userid, $idsp);
                            }
                            header("Location:index.php?act=sanphamchitiet&idsp=$idsp");
                        }
                    } else {
                        header('Location: index.php?act=dangnhap');
                    }
                    break;
                    case 'giohang':
                        if (isset($_SESSION['user']['id'])) {
                            $userid = $_SESSION['user']['id'];
                            $listgiohang = loadall_giohang($userid);
                            include "view/cart/viewcart.php";
                        } else {
                            header('Location: index.php?act=dangnhap');
                        }
                        break;
                        case'xoagiohang':
                        if(isset($_GET['idgiohang'])&& ($_GET['idgiohang']>0)){
                           delete_giohang($_GET['idgiohang']);
                             header('Location: index.php?act=giohang');
                        }
                       
                        break;
                        case'xoagiohang1':
                            if(isset($_POST['xoagiohang1'])){
                                $check = check_giohang($idsp, $userid);
                            unset($check);
                            }

        default:
            break;
    }
} else {
    include "view/home.php";
}
include "view/footer.php";
?>