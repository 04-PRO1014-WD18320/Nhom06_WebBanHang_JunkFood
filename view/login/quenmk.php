<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../css/du.css">
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
        <form action="../../index.php?act=quenmk" method="post">
            <h1>Lấy Lại Mật Khẩu</h1>
            <div class="input-box">
                <p>Email</p>
                <input type="email" name="email" placeholder="Nhap email">
            </div>
            <br>
            <input type="submit" class="click" style="width: 70px; height: 30px; border-radius: 5px; border: none;" value="gui" name="guiemail">
            <input type="reset" class="click" style="width: 70px; height: 30px; border-radius: 5px; border: none;" value="Nhập lại">

            <div class="register-link">
                <p><a href="dangnhap.php">Login</a></p>
            </div>
            
        </form>
        <?php
            if(isset($thongbao) && $thongbao != ""){
                echo $thongbao;
            }
        ?>
    </div>
</body>
</html>