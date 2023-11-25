<?php
    function insert_taikhoan($email,$user,$pass,$tel,$address){
        $sql="insert into taikhoan(email,user,pass,tel,address) values('$email','$user','$pass','$tel','$address')";
        pdo_execute($sql);
    }
    function checkuser($user,$pass){
        $sql="select * from taikhoan where user='$user' and pass='$pass'";
        $taikhoan=pdo_query_one($sql);
        return $taikhoan;
    }
    function getuserinfo($user,$pass){
        $conn=pdo_get_connection();
        $stmt = $conn->prepare("SELECT * FROM taikhoan WHERE user='".$user."' AND pass='".$pass."'");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $kq=$stmt->fetchAll();
        return $kq;
    }
?>