<?php
    function loadall_taikhoan(){
        $sql="select * from taikhoan order by id desc";
        $listtaikhoan=pdo_query($sql);
        return $listtaikhoan;
    }
    function insert_taikhoan($email,$user,$pass,$tel,$address){
        $sql="insert into taikhoan(email,user,pass,tel,address) values('$email','$user','$pass','$tel','$address')";
        pdo_execute($sql);
    }
    function checkuser($user,$pass){
        $sql="select * from taikhoan where user='$user' and pass='$pass'";
        $taikhoan=pdo_query_one($sql);
        return $taikhoan;
    }
    function checkemail($email){
        $sql="select * from taikhoan where email='$email'";
        $taikhoan=pdo_query_one($sql);
        return $taikhoan;
    }
    function update_taikhoan($id,$user,$pass,$email,$address,$tel){
        $sql="update taikhoan set user='".$user."', pass='".$pass."', email='".$email."', address='".$address."', tel='".$tel."' where id=".$id;
        pdo_execute($sql);
    }
    function delete_tk($id){
        $sql = "DELETE FROM taikhoan where id=".$id;
        $taikhoan=pdo_execute($sql);
        return $taikhoan;
    }
?>