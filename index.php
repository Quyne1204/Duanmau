<?php
    session_start();
    include './view/header.php';
    include 'model/pdo.php';
    include 'model/cart.php';
    include 'model/sanpham.php';
    include 'model/danhmuc.php';
    include 'model/taikhoan.php';
    if(!isset($_SESSION['mycart'])) $_SESSION['mycart']=[];

    $dm_all = loai_all();
    $sp_new = sp_all_home();
    $sp_top10 = sp_top10();
    

    if(isset($_GET['act'])){
        $act = $_GET['act'];
        switch ($act) {
            case 'sanpham':
                if(isset($_POST['kyw'])&&($_POST['kyw']!="")){
                    $kyw = $_POST['kyw'];
                }else{
                    $kyw = "";
                }
                if(isset($_GET['id_loai'])&&($_GET['id_loai']>0)){
                    $id = $_GET['id_loai'];
                }else{
                    $id =  0;
                }
                $list_sp = sp_all($kyw, $id);
                $name_dm = load_namedm($id);
                include 'view/sanpham.php';
                break;
            case 'detail':
                if(isset($_GET['id_sp'])&&($_GET['id_sp']>0)){
                    $id = $_GET['id_sp'];
                    $onesp = sp_one($id);
                    extract($onesp);
                    $sp_cungloai = sp_cungloai($id,$id_dm);
                    include 'view/detail_sp.php';
                }else{
                    include 'view/home.php';
                }
                break;
            case 'dangky':
                if(isset($_POST['dangky'])&&($_POST['dangky'])){
                    $username = $_POST['username'];
                    $email = $_POST['email'];
                    $password = $_POST['password'];

                    tk_insert($username,$password,$email);
                    $tb="Đăng ký thành công";
                }

                include 'view/taikhoan/dangky.php';
                break;
            case 'dangnhap':
                if(isset($_POST['login'])&&($_POST['login'])){
                    $username = $_POST['username'];
                    $password = $_POST['password'];

                    $login = tk_login($username,$password);
                    if(is_array($login)){
                        $_SESSION['user'] = $login;
                        header("Location: index.php");
                    }else{
                        $tb="Thông tin đăng nhập không đúng hoặc tài khoản chưa được đăng ký";
                    }
                }
                include 'view/home.php';
                break;
            case 'edit_tk':
                if(isset($_POST['capnhat'])&&($_POST['capnhat'])){
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $email = $_POST['email'];
                    $name = $_POST['name'];
                    $id_user = $_POST['id'];
                    $diachi = $_POST['diachi'];
                    $sdt = $_POST['sdt'];

                    $name_img = $_FILES['img']['name']; 
                    $target_dir = "images/user/";
                    $target_file = $target_dir . basename($_FILES["img"]["name"]); 
                    move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);

                    $tk_update = tk_update($id_user,$username,$password,$name_img,$email,$name,$diachi,$sdt);
                    $_SESSION['user'] = tk_login($username,$password);
                    header("Location index.php?act=edit_tk");
                }
                include 'view/taikhoan/edit_tk.php';
                break;
            case 'quenpass':
                if(isset($_POST['quenpass'])&&($_POST['quenpass'])){
                    $email = $_POST['email'];
                    $tk_quenpass = tk_quenpass($email);
                    if(is_array($tk_quenpass)){
                        $tb="Mật khẩu của bạn là: ".$tk_quenpass['password'];
                    }else{
                        $tb="Email không tồn tại ";
                    }
                }
                include 'view/taikhoan/quenpass.php';
                break;
            case 'dangxuat':
                session_destroy();
                unset($_SESSION['user']);
                include 'view/home.php';
                break;

            case 'addtocart':
                if(isset($_POST['addtocart'])&&($_POST['addtocart'])){
                    $id = $_POST['id'];
                    $name = $_POST['name'];
                    $img = $_POST['img'];
                    $price = $_POST['price'];
                    $soluong = 1;
                    $thanhtien = $soluong * $price;
                    $spadd=[$id,$name,$img,$price,$soluong,$thanhtien];
                    array_push($_SESSION['mycart'],$spadd);
                }
                include 'view/giohang/viewcart.php';
                break;
            case 'delcart':
                if(isset($_GET['id'])){
                    array_splice($_SESSION['mycart'],$_GET['id'],1);
                }else{
                    $_SESSION['mycart']=[];
                }
                include 'view/giohang/viewcart.php';
                break;
            case 'bill':
                include 'view/giohang/bill.php';
                break;
            case 'viewcart':
                include 'view/giohang/viewcart.php';
                break;
            case 'billcomfirm':
                if(isset($_POST['thanhtoan'])&&($_POST['thanhtoan'])){
                    if(isset($_SESSION['user'])){
                         $iduser=$_SESSION['user']['id_user'];
                    }else{
                         $iduser = 0;
                    }
                    $name = $_POST['name'];
                    $diachi = $_POST['diachi'];
                    $sdt = $_POST['sdt'];
                    $date = date("y-m-d",time());
                    $tongdonhang= tongdonhang();
                    $pttt = $_POST['pttt'];

                    $id_bill = insert_bill($iduser,$name,$diachi,$sdt,$date,$pttt,$tongdonhang);

                    foreach($_SESSION['mycart'] as $cart){
                        insert_cart($_SESSION['user']['id_user'],$cart[0],$cart[2],$cart[1],$cart[3],$cart[4],$cart[5],$id_bill);
                    }
                    $_SESSION['mycart']=[];
                }
                $list_bill = loadone_bill($id_bill);
                $ct_bill = loadall_cart($id_bill);
                include 'view/giohang/billcomfirm.php';
                break;
            case 'mybill':
                $dsbill = load_all_bill($_SESSION['user']['id_user']);
                include 'view/giohang/mybill.php';
                break;
            case 'gioithieu':
                include 'view/gioithieu.php';
                break;
            case 'gopy':
                include 'view/gopy.php';
                break;
            case 'lienhe':
                include 'view/lienhe.php';
                break;
            default:
                include 'view/home.php';
                break;    
        }
    }else{
        
        include 'view/home.php';
    }
    include './view/footer.php';
?>