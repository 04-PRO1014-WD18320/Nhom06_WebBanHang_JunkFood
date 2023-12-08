<?php
session_start();
ob_start();
include "mdel/pdo.php";
include "mdel/danhmuc.php";
include "mdel/sanpham.php";
include "mdel/taikhoan.php";
include "mdel/binhluan.php";
include "global.php";
include "mdel/cart.php";
include "mdel/giohang.php";
include "mdel/donhang.php";
include "view/header.php";
$listsp = loadall_sanpham_home();
$listspmin = loadall_sanpham_soluongmin();
if ((isset($_GET['act'])) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
        case 'sanpham':
                if(isset($_POST['kyw'])&&($_POST['kyw']!="")){
                    $kyw=$_POST['kyw'];

                }else{
                    $kyw="";
                }
                if(isset($_GET['iddm'])&&($_GET['iddm']>0)){
                    $iddm=$_GET['iddm'];
                    
                }else{
                    $iddm=0;
                }
                    $dssp=loadall_sanpham($kyw,$iddm);
                    $tendm=loadone_ten_dm($iddm);
                    include "view/sanpham.php";
                break;
        case "sanphamchitiet":
            if (isset($_GET["idsp"]) && ($_GET["idsp"]) > 0) {
                $listspct = loadone_sanpham($_GET["idsp"]);
                extract($listspct);
                $spcl = load_sanpham_cungloai($id, $iddm);
                include "view/chitietsanpham.php";
            } else {
                echo "Lỗi to đùng";
                include "view/home.php";
            }
            break;
        case "donhang":
            if (isset($_GET["idsp"]) && ($_GET["idsp"]) > 0) {
                $listspct = loadone_sanpham($_GET["idsp"]);
                extract($listspct);

                include "view/donhang.php";
            } else {
                echo "Lỗi to đùng";
                include "view/home.php";
            }
            break;
        case 'dangky':
            if (isset($_POST['dangky']) && ($_POST['dangky'])) {
                $email = $_POST['email'];
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                insert_taikhoan($email, $user, $pass);
            }
            $thongbao = "Đăng Ký Thành Công";
            include "view/login/dangky.php";
            break;
        case 'dangnhap':
            if (isset($_POST['dangnhap']) && ($_POST['dangnhap'])) {
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $checkuser = checkuser($user, $pass);
                if (is_array($checkuser)) {
                    $_SESSION['user'] = $checkuser;
                    header('Location: index.php');
                } else {
                    $thongbao = "tai khoan ko ton tai vui long kiem tra hoac dang ky";
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
        case 'xoagiohang':
            if (isset($_GET['idgiohang']) && ($_GET['idgiohang'] > 0)) {
                delete_giohang($_GET['idgiohang']);
                header('Location: index.php?act=giohang');
            }

            break;
        case 'xoagiohang1':
            if (isset($_POST['xoagiohang1'])) {
                $check = check_giohang($idsp, $userid);
                unset( $_SESSION['cart']);
                header('Location: index.php?act=giohang');
            }


        case 'quenmk':
            if (isset($_POST['guiemail']) && ($_POST['guiemail'])) {
                $email = $_POST['email'];

                $checkemail = checkemail($email);
                if (is_array($checkemail)) {
                    $thongbao = "Mat Khau Cua Ban la: " . $checkemail['pass'];
                } else {
                    $thongbao = "email nay ko ton tai";
                }
            }
            // header('Location: view/login/quenmk.php');
            include "view/login/quenmk.php";
            break;
        case 'edit_taikhoan':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $tel = $_POST['tel'];
                $id = $_POST['id'];
                update_taikhoan($id, $user, $pass, $email, $address, $tel);
                $checkuser = checkuser($user, $pass);
                if (is_array($checkuser)) {
                    $_SESSION['user'] = $checkuser;
                    header('Location: index.php?act=edit_taikhoan');
                }
            }
            include "view/login/edit_taikhoan.php";
            break;
        case 'bill':
            if (isset($_SESSION['user']['id'])) {
                $userid = $_SESSION['user']['id'];
                $listgiohang = loadall_giohang($userid);
                include "view/cart/mybill.php";
            } else {
                header('Location: index.php?act=dangnhap');
            }
        case 'mybill':
            $idbill =" ";
            if (isset($_POST['dathang'])) {
                $name = $_POST['name'];
                $phone = $_POST['tel'];
                $address = $_POST['address'];
                $note = $_POST['note'];
                $pttt=$_POST['pttt'];
                $date=DATE('h:i:sa d/m/Y');
                $idbill =insert_donhang($name,$phone,$address,$note,$pttt,$date);
                if (isset($_SESSION['user']['id'])) {
                    $userid = $_SESSION['user']['id'];
                    $listgiohang = loadall_giohang($userid);
                    foreach ($listgiohang as $listsp){
                        extract($listsp);
                        $tensp=$name;
                        $img="upload/".$img;
                       $soluong1=$soluong;
                       $price1=$price;
                       $thanhtien=$soluong1*$price1;
                       $date1=DATE('h:i:sa d/m/Y');
                       if(isset($_POST['pttt'])){
                        if($_POST['pttt']==0){
                            $thanhtien=$thanhtien+20000;
                        }else{
                            $thanhtien=$thanhtien+20000;
                        }
                    }
                        insert_donhang_sp($idbill ,$tensp,$img,$soluong1,$price1,$thanhtien,$date1);
                    }
                    include "view/cart/formdhtc.php";
                }
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