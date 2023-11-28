<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./view/css/du.css">
    <style>
        .click{
            cursor: pointer;
        }
        .click:hover{
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <?php
            if(isset($_SESSION['user'])){
                extract($_SESSION['user']);
               
            }
        ?>
        <form action="index.php?act=edit_taikhoan" method="post">
            <h1>Login</h1>
            <div class="input-box">
            <p>Email</p>
            <input type="email" name="email" placeholder="email" value="<?=$email?>">
            </div>
            <div class="input-box">
            Tên đăng nhập
            <input type="text" name="user"  placeholder="user" value="<?=$user?>">
            </div>
            <div class="input-box">
            Mật khẩu
            <input type="password" name="pass"  placeholder="pass" value="<?=$pass?>">
            </div>
            <div class="input-box">
            Dia Chi
            <input type="text" name="address"  placeholder="address" value="<?=$address?>">
            </div>
            <div class="input-box">
            Dien Thoai
            <input type="text" name="tel"  placeholder="tel" value="<?=$tel?>">
            </div>
            <input type="hidden" style="width: 70px; height: 30px; border-radius: 5px; border: none;" name="id" value="<?=$id?>">
            <input type="submit" style="width: 70px; height: 30px; border-radius: 5px; border: none;" value="Cap Nhat" name="capnhat">
            <input type="reset" style="width: 70px; height: 30px; border-radius: 5px; border: none;" value="Nhập lại">
            
        </form>
        <?php
            if(isset($thongbao) && $thongbao != ""){
                echo $thongbao;
            }
        ?>
    </div>
</body>
</html>