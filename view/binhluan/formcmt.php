<?php
    session_start();
    include '../../model/pdo.php';
    include '../../model/binhluan.php';
    $id_pro = $_REQUEST['id_pro'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Chủ</title>
    <link rel="stylesheet" href="./css/index.css">
</head>

<body>
    <div> 
        <h1>Bình Luận</h1>
        <table class="cmt">
            <?php
                $dscmt = loai_cmt($id_pro);
                foreach ($dscmt as $cmt) {
                    extract($cmt);
                    echo '
                        <tr>
                            <td width="10%">'.$noidung.'</td>
                            <td width="10%">'.$username.'</td>
                            <td width="10%">'.$ngaycmt.'</td>
                        </tr>
                    ';
                }

            ?>
        </table>
    </div>
    <?php
         if(isset($_SESSION['user'])){
    ?>
        <form class="flex" action="<?=$_SERVER['PHP_SELF'];?>" method="POST">
        <input type="hidden" name="id_pro" value="<?=$id_pro?>">  
        <input style="width:50%;height:30px;margin:10px 0px;border-radius:20px; padding:0px 20px" type="text" name="noidung">
        <input style="width:30%;height:30px;margin:10px 0px;border-radius:20px" type="submit" name="send" value="Gửi ">
    </form>
    <?php 
        }
    ?>
    <?php
        if(isset($_POST['send'])&&($_POST['send'])){
            $noidung = $_POST['noidung'];
            $id_pro = $_POST['id_pro'];
            $username = $_SESSION['user']['username'];
            $date = date("d-m-y",time());
            binh_luan_insert($noidung,$username,$id_pro,$date);
            header("Location: ".$_SERVER['HTTP_REFERER']);
        }

    ?>
</body>
</html>