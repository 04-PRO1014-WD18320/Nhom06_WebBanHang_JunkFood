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
        <form action="../../index.php?act=dangnhap" onsubmit=" return thongBao()" method="post">
            <h1>Login</h1>
            <div class="input-box">
                <input type="text" id="user" name="user" placeholder="Username"
                required>
                <i class='bx bxs-user' ></i>
                <label for="" id="loi1"></label>
            </div>
            <div class="input-box">
                <input type="password" id="pass" name="pass"
                placeholder="password" required>
                <i class='bx bxs-lock-alt' ></i>
                <label for="" id="loi2"></label>
            </div>
            <br>
            <div class="remember-forgot">
                <label for=""><input type="checkbox"> Remember me
                </label>
                <a href="../login/quenmk.php">Forgot passwork?</a>
            </div>

            <input type="submit" class="btn-login" name="dangnhap" value="Đăng Nhập">
            
            <div class="register-link">
                <p> Don't have account? <a href="dangky.php">Register</a></p>
            </div>
            
        </form>
        
    </div>
    <script>
        function thongBao(){
            var mk = document.getElementById("pass");
            var ten = document.getElementById("user");
            var loi11 = document.getElementById("loi1");
            var loi12 = document.getElementById("loi2");
            var dem = 0;
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