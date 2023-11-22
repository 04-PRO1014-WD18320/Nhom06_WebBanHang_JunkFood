<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../css/du.css">
</head>
<body>
    <div class="wrapper">
        <form action="../../index.php?act=dangky" method="post">
            <h1>Register</h1>
            <div class="input-box">
                <input type="email" name="email" placeholder="Emaill"
                required>
                <i class='bx bxl-gmail' ></i>
            </div>
            <div class="input-box">
                <input type="text" name="user" placeholder="Username"
                required>
                <i class='bx bxs-user' ></i>
            </div>
            <div class="input-box">
                <input type="password"
                placeholder="password" name="pass" required>
                <i class='bx bxs-lock-alt' ></i>
            </div>
            <div class="input-box">
                <input type="text"
                placeholder="phone" name="tel" required>
                <i class='bx bxs-phone' ></i>
            </div>
            <div class="input-box">
                <input type="text"
                placeholder="address" name="address" required>
                <i class='bx bxs-home' ></i>
            </div>
            
          <input type="submit" value="Đăng Ký" name="dangky" class="btn-login">

            <div class="register-link">
                <p> Do you already have an account! <a href="dangnhap.php">Login</a></p>
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