<?php
include "../mdel/pdo.php";
include "header.php";
include "../mdel/danhmuc.php";
include "../mdel/sanpham.php";
include "../mdel/taikhoan.php";
include "../mdel/donhang.php";
include "../mdel/binhluan.php";
// include "../model/binhluan.php";
// include "../model/cart.php";

if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        case 'adddm':
            //kiem tra xem nguoi dung co nhan vao add hay khong
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $namedm = $_POST['namedm'];
                insert_danhmuc($namedm);

                $thongbao = "them thanh cong";
            }

            include "danhmuc/add.php";
            break;
        case 'lisdm':

            $listdanhmuc = loadall_danhmuc();
            include "danhmuc/list.php";
            break;

        case 'xoadm':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_danhmuc($_GET['id']);
            }
            $listdanhmuc = loadall_danhmuc();
            include "danhmuc/list.php";
            break;

        case 'suadm':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {

                $dm = loadone_danhmuc($_GET['id']);
            }

            include "danhmuc/update.php";
            break;

        case 'updatedm':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $namedm = $_POST['namedm'];
                $id = $_POST['id'];
                update_danhmuc($id, $namedm);
                $thongbao = "cap nhat thanh cong";
            }
            $listdanhmuc = loadall_danhmuc();
            include "danhmuc/list.php";
            break;
            // san pham
        case 'addsp':
            //kiem tra xem nguoi dung co nhan vao add hay khong
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $tensp = $_POST['tensp'];
                $iddm = $_POST['iddm'];
                $giasp = $_POST['giasp'];
                $mota = $_POST['mota'];
                $soluong = $_POST['soluong'];

                $hinh = $_FILES['hinh']['name'];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                } else {
                }
                insert_sanpham($tensp, $giasp, $hinh, $mota, $iddm, $soluong);

                $thongbao = "them thanh cong";
            }
            $listdanhmuc = loadall_danhmuc();
            include "sanpham/add.php";
            break;
        case 'lissp':
            if (isset($_POST['listok']) && ($_POST['listok'])) {
                $kyw = $_POST['kyw'];
                $iddm = $_POST['iddm'];
            } else {
                $kyw = '';
                $iddm = 0;
            }
            $listdanhmuc = loadall_danhmuc();
            $listsanpham = loadall_sanpham($kyw, $iddm);
            include "sanpham/list.php";
            break;

        case 'xoasp':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_sanpham($_GET['id']);
            }
            $listsanpham = loadall_sanpham("", 0);
            include "sanpham/list.php";
            break;

        case 'suasp':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {

                $sanpham = loadone_sanpham($_GET['id']);
            }
            $listdanhmuc = loadall_danhmuc();
            include "sanpham/update.php";
            break; 
   
        case 'updatesp':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $tensp = $_POST['tensp'];
                $iddm = $_POST['iddm'];
                $giasp = $_POST['giasp'];
                $mota = $_POST['mota'];
                $id = $_POST['id'];
                $soluong = $_POST['soluong'];

                $hinh = $_FILES['hinh']['name'];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                } else {
                }
                update_sanpham($iddm, $id, $tensp, $giasp, $mota, $hinh, $soluong);
                $thongbao = "cap nhat thanh cong";
            }
            $listdanhmuc = loadall_danhmuc();
            $listsanpham = loadall_sanpham("", 0);
            include "sanpham/list.php";
            break;
            case "xoatk":
                if (isset($_GET["id"]) && ($_GET["id"] > 0)) {
                    delete_tk($_GET["id"]);
                }
                $listtaikhoan = loadall_taikhoan();
                include "taikhoan/list.php";
                break;
            case 'dskh':
                $listtaikhoan=loadall_taikhoan();
                include "taikhoan/list.php";
                break;


            case 'donhang':
                $cart = get_all_cart();
                renderAD('donhang/list',['list' => $cart]);
                break;
            case 'edit_cart':
                if(isset($_GET['id_cart'])){
                    $cart = get_cart_by_id($_GET['id_cart']);
                    renderAD('donhang/update',['cart'=>$cart]);
                }
                break;
            case 'update_cart':
                if(isset($_POST['capnhat'])){
                    $role = $_POST['status'];
                    $cart_id = $_POST['cart_id'];
                    update_cart($role,$cart_id);
                    echo "<script>alert('Cập nhật thành công!');window.location='index.php?act=donhang'</script>";
                }
                break;
            case 'detail_cart':
                if(isset($_GET['id_cart'])){
                    $cart = get_cart_by_id($_GET['id_cart']);
                    renderAD('don_hang/detail',['cart'=>$cart]);
                }
                break;
            case 'thongke':
                $listthongke=loadall_thongke();
                include "thongke/list.php";
                break;
            case 'bieudo':
                $listthongke=loadall_thongke();
                include "thongke/bieudo.php";
                break;
            case 'dsbl':
                $listbinhluan=loadall_binhluan(0);
                include "binhluan/list.php";
                break;
            case "xoabl":
                if (isset($_GET["id"]) && ($_GET["id"] > 0)) {
                    delete_bl($_GET["id"]);
                }
                $listbinhluan=loadall_binhluan(0);
                include "binhluan/list.php";
                break;
        // case 'dskh':

        //     $listtaikhoan =  loadall_taikhoan();
        //     include "taikhoan/list.php";
        //     break;

        // case 'dsbl':

        //     $listbinhluan =  loadall_binhluan(0);
        //     include "binhluan/list.php";
        //     break;
        // case 'thongke':

        //     $listthongke =  loadall_thongke();
        //     include "thongke/list.php";
        //     break;
        //     case 'bieudo':

        //         $listthongke =  loadall_thongke();
        //         include "thongke/bieudo.php";
        //         break;
        case 'thoat':
            unset($_SESSION['user']);
            header('Location: index.php');
            // include_once "index.php";
            break;
        default:
            include "home.php";
            break;
    }
} else {
    include "home.php";
}
include "home.php";


