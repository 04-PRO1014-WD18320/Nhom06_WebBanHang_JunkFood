<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../css/du.css">
    <link rel="stylesheet" href="./view/css/du.css">
</head>
<body>
    <div class="wrapper">
        <form action="../../index.php?act=dangky" onsubmit=" return thongBao()"  method="post">
            <h1>Register</h1>
            <div class="input-box">
                <input type="email" id="email" name="email" placeholder="Emaill"
                required>
                <i class='bx bxl-gmail' ></i>
                <label for="" id="loi3"></label>
            </div>
            <div class="input-box">
                <input type="text" id="user" name="user" placeholder="Username"
                required>
                <i class='bx bxs-user' ></i>
                <label for="" id="loi1"></label>
            </div>
            <div class="input-box">
                <input type="password"
                placeholder="password" id="pass" name="pass" required>
                <i class='bx bxs-lock-alt' ></i>
                <label for="" id="loi2"></label>
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
    <script>
        function thongBao(){
            var mk = document.getElementById("pass");
            var ten = document.getElementById("user");
            var em = document.getElementById("email");
            var loi11 = document.getElementById("loi1");
            var loi12 = document.getElementById("loi2");
            var loi13 = document.getElementById("loi3");
            var dem = 0;
            if(em.value.length == 0 ){
                dem ++;
                loi13.innerText = 'nhap email';
            }
            else{
                loi13.innerText = '';
            }
            if(ten.value.length == 0 ){
                dem ++;
                loi11.innerText = 'nhap ten';
            }
            else{
                loi11.innerText = '';
            }
            if(mk.value.length == 0 ){
                dem ++;
                loi3.innerText = 'nhap pass';
            }else if(mk.value.length < 5 || mk.value.length >13){
                dem ++;
                loi12.innerText = 'phai 5 -> 13 ki tu';
            }
            else{
                loi12.innerText = '';
            }
            if(dem == 0){
                return true;
            }
            else{
                return false;
            }
        }
    </script>
</body>
</html>