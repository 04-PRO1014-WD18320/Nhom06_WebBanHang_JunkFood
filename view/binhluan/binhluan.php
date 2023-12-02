<?php

    session_start();
    include "../../mdel/pdo.php";
    include "../../mdel/binhluan.php";
    $idpro=$_REQUEST['idpro'];
    $dsbl=loadall_binhluan($idpro);
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../admin/css/style.css">
    <style>
        .binhluan{
            background-color: white;
            border: 1px solid gray;
            margin-bottom: 10px;
            border-radius: 5px;
        }
        .binhluan table{
            width: 90%;
            margin-left: 5%;
        }
        .binhluan table td:nth-child(1){
            width: 50%;
        }
        .binhluan table td:nth-child(2){
            width: 20%;
        }
        .binhluan table td:nth-child(3){
            width: 30%;
        }
        .btn-bl{
            border: none;
            background-color: black;
            color: white;
            padding: 5px;
            border-radius: 5px;
        }
        .btn-nhap{
            padding: 5px;
            border-radius: 5px;
            border: 1px solid #333;
        }
    </style>
</head>
<body>
    
</body>
</html>

<div class="row mb">
    <div class="boxtile"><h3>Bình Luận</h3></div>
    <div class="boxcontent2 binhluan">
        <table >
            <?php
                foreach ($dsbl as $bl) {
                    extract($bl);
                    echo '<tr><td>'.$noidung.'</td>';
                    echo '<td>'.$iduser.'</td>';
                    echo '<td>'.$ngaybinhluan.'</td></tr>';
                }
            ?>
        </table>
    </div>
    <div class="boxfooter binhluanform">
        <form action="<?=$_SERVER['PHP_SELF'];?>" method="post">
            <input type="hidden" name="idpro" value="<?=$idpro?>">
            <input type="text" class="btn-nhap" placeholder="noidung" name="noidung">
            <input type="submit" class="btn-bl" name="guibinhluan" value="Gửi">
        </form>
    </div>
    
    <?php
    if(isset($_POST['guibinhluan'])&&($_POST['guibinhluan'])){
        $noidung=($_POST['noidung']);
        $idpro=($_POST['idpro']);
        $ngaybinhluan=date('h:i:sa d/m/Y');
        insert_binhluan($noidung,$_SESSION['user']['id'],$idpro,$ngaybinhluan);
        header("Location: ".$_SERVER['HTTP_REFERER']);
    }

    ?>

</div>
    
</body>
</html>