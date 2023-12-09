<?php
    function insert_taikhoan($email,$user,$pass){
        $sql="insert into taikhoan(email,user,pass,tel,address) values('$email','$user','$pass')";
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
    function renderUS($path,$data = [])
    {
        extract($data);
        $view = "../users/".$path.".php";
        include_once $view;
    }
    function loadall_taikhoan(){
        $sql="select * from taikhoan order by id desc";
        $listtaikhoan=pdo_query($sql);
        return $listtaikhoan;
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

    function getalluser(){
        $sql ="select * from user";
        return pdo_query($sql);
    }
    function get_user_by_id($id_user){
        $sql = "select * from taikhoan where id = ?";
        return pdo_query_one($sql,$id_user);
    }
?>