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
        <?php
            if(isset($_SESSION['user'])){
            extract($_SESSION['user']);
        ?>
        <?php
            }else{
        ?>
        <form action="index.php?act=dangnhap">
            <h1>Login</h1>
            <div class="input-box">
                <input type="text" name="user" placeholder="Username"
                required>
                <i class='bx bxs-user' ></i>
            </div>
            <div class="input-box">
                <input type="password" name="pass"
                placeholder="password" required>
                <i class='bx bxs-lock-alt' ></i>
            </div>
            <div class="remember-forgot">
                <label for=""><input type="checkbox"> Remember me
                </label>
                <a href="#">Forgot passwork?</a>
            </div>

            <input type="submit" class="btn-login" name="dangnhap" value="Đăng Nhập">
            
            <div class="register-link">
                <p> Don't have account? <a href="dangky.php">Register</a></p>
            </div>
            <?php
                if(isset($loginMess) && $loginMess != ""){
                    echo $loginMess;
                }
            ?>
        </form>
        <?php }?>
    </div>
</body>
</html>