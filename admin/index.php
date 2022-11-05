<?php
    include '../model/pdo.php';
    include 'header.php';   
    include '../model/danhmuc.php';
    include '../model/sanpham.php';
    include '../model/taikhoan.php';
    include '../model/binhluan.php';
    include '../model/thongke.php';
    include '../model/cart.php';
    //home.php
    if(isset($_GET['act'])){
        $act = $_GET['act'];
        switch ($act) {
/////////////hang hoa/////////////////////////////////////////////////////////////////////////



            case 'dsdm':
                $list_dm = loai_all();
                include './danhmuc/list_dm.php';
                break;

            case 'adddm':
                if(isset($_POST['add_dm'])&&($_POST['add_dm'])){
                    $name = $_POST['name'];
                    loai_insert($name);
                    $tb="Thêm danh mục thành công";
                }
                include './danhmuc/add_dm.php';
                break;
            
            case 'delete_dm':
                if(isset($_GET['id'])&&($_GET['id']>0)){
                    loai_delete($_GET['id']);
                }
                $list_dm = loai_all();
                include './danhmuc/list_dm.php';
                break;

            case 'update_dm':
                if(isset($_GET['id'])&&($_GET['id'])){
                    $dm = loai_one($_GET['id']);
                }
                include './danhmuc/update_dm.php';
                break;  
            case 'updatedm':
                if(isset($_POST['update_dm'])&&($_POST['update_dm'])){
                    $name = $_POST['name'];
                    $id = $_POST['id_dm'];
                    loai_update($id, $name);
                }
                $list_dm = loai_all();
                include './danhmuc/list_dm.php';
                break;
/////////////sanpham///////////////////////////////////////////////////////////////////////////////////




            case 'dssp':
                if(isset($_POST['listok'])&&($_POST['listok'])){
                    $kyw = $_POST['kyw'];
                    $id_loai = $_POST['id_loai'];
                }else{
                    $kyw = "";
                    $id_loai = 0;
                }
                $list_sp = sp_all($kyw, $id_loai);
                $list_dm = loai_all();
                include './sanpham/list_sp.php';
                break;
            case 'addsp':
                if(isset($_POST['add_sp'])&&($_POST['add_sp'])){
                   $name = $_POST['name'];
                    $price = $_POST['price'];
                    $sale = $_POST['sale'];
                    $loaihang = $_POST['loaihang'];
                    $date = $_POST['date'];
                    $detail = $_POST['detail']; 

                    $name_img = $_FILES['img']['name']; 
                    $target_dir = "../images/sanpham/";
                    $target_file = $target_dir . basename($_FILES["img"]["name"]); 
                    move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);

                    sp_insert($name,$price,$name_img,$detail,$date,$sale,$loaihang);
                    $tb="Thêm hàng hóa thành công";
                }
                $list_dm = loai_all();
                include './sanpham/add_sp.php';
                break;
            case 'update_sp':
                if(isset($_GET['id'])&&($_GET['id'])){
                    $sp = sp_one($_GET['id']);
                }
                $list_sp = sp_all("",0);
                $list_dm = loai_all();
                include './sanpham/update_sp.php';  
                break;  
            case 'updatesp':
                if(isset($_POST['update_sp'])&&($_POST['update_sp'])){
                    $name = $_POST['name'];
                    $price = $_POST['price'];
                    $sale = $_POST['sale'];
                    $loaihang = $_POST['loaihang'];
                    $date = $_POST['date'];
                    $detail = $_POST['detail'];
                    $id_sp = $_POST['id_sp'];
                    
                    $name_img = $_FILES['img']['name']; 
                    $target_dir = "../images/sanpham/";
                    $target_file = $target_dir . basename($_FILES["img"]["name"]); 
                    move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);

                    sp_update($id_sp,$name,$price,$name_img,$detail,$date,$sale,$loaihang);
                }
                $list_sp = sp_all();
                $list_dm = loai_all();
                include './sanpham/list_sp.php';
                break;
            case 'delete_sp':
                if(isset($_GET['id'])&&($_GET['id']>0)){
                    sp_delete($_GET['id']);
                }
                $sql = "select * from sanpham order by id_sp desc";
                $list_sp = pdo_query($sql);
                include './sanpham/list_sp.php';
                break;
////////////khach hang////////////////////////////////////////////////////////////////////////////////



            case 'dsuser':
                if(isset($_POST['listok'])&&($_POST['listok'])){
                    $kyw = $_POST['kyw'];
                    $vaitro = $_POST['vaitro'];
                }else{
                    $kyw = "";
                    $vaitro = 0;    
                }
                $list_user = user_all($kyw, $vaitro);
                include './khachhang/list_user.php';
                break;
            case 'adduser':
                if(isset($_POST['add_user'])&&($_POST['add_user'])){
                    $name = $_POST['name'];
                    $username = $_POST['username'];
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    $vaitro = $_POST['vaitro'];
                    $diachi = $_POST['diachi'];
                    $sdt = $_POST['sdt'];

                    $name_img = $_FILES['img']['name']; 
                    $target_dir = "../images/user/";
                    $target_file = $target_dir . basename($_FILES["img"]["name"]); 
                    move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);
 
                    $add_user = user_insert($username,$password,$email,$name,$name_img,$vaitro,$diachi,$sdt);
                    $tb="Thêm khách hàng thành công";
                 }
                include './khachhang/add_user.php';
                break;
            case 'update_user':
                if(isset($_GET['id'])&&($_GET['id'])){
                    $user = user_one($_GET['id']);
                }
                $list_user = user_all();
                include './khachhang/update_user.php';  
                break;  
            case 'updateuser':
                if(isset($_POST['update_user'])&&($_POST['update_user'])){
                    $name = $_POST['name'];
                    $username = $_POST['username'];
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    $vaitro = $_POST['vaitro'];
                    $diachi = $_POST['diachi'];
                    $sdt = $_POST['sdt'];
                    $id_user = $_POST['id_user'];

                    $name_img = $_FILES['img']['name']; 
                    $target_dir = "../images/user/";
                    $target_file = $target_dir . basename($_FILES["img"]["name"]); 
                    move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);
 
                    $update_user = user_update($id_user,$username,$password,$name_img,$email,$name,$vaitro,$diachi,$sdt);
                    $user = user_one($id_user);
                }
                $list_user = user_all();
                include './khachhang/list_user.php';  
                break;  
            case 'delete_user':
                if(isset($_GET['id'])&&($_GET['id']>0)){
                    user_delete($_GET['id']);
                }
                $sql = "select * from user order by id_user desc";
                $list_user = pdo_query($sql);
                include './khachhang/list_user.php';
                break;
////////////binh luan////////////////////////////////////////////////////////////////////////////////////////



            case 'dscmt':
                $list_cmt = cmt_all();
                include './binhluan/list_cmt.php';
                break;
            case 'update_cmt':
                if(isset($_GET['id'])&&($_GET['id'])){
                    $cmt = cmt_one($_GET['id']);
                }
                include './binhluan/update_cmt.php';  
                break;  
            case 'updatecmt':
                if(isset($_POST['update_cmt'])&&($_POST['update_cmt'])){
                    $username = $_POST['username'];
                    $id_pro = $_POST['id_pro'];
                    $noidung = $_POST['noidung'];
                    $date = $_POST['date'];
                    $id_cmt = $_POST['id_cmt'];
    
                    $update_cmt = cmt_update($id_cmt,$username,$id_pro,$noidung,$date);
                    $cmt = cmt_one($id_cmt);
                }
                $list_cmt = cmt_all();
                include './binhluan/list_cmt.php';  
                break;  
            case 'delete_cmt':
                if(isset($_GET['id'])&&($_GET['id']>0)){
                    cmt_delete($_GET['id']);
                }
                $sql = "select * from binhluan order by id_cmt desc";
                $list_cmt = pdo_query($sql);
                include './binhluan/list_cmt.php';
                break;
////////////don hang////////////////////////////////////////////////////////////////////////////////////////////
    


            
            case 'dsdh':
                if(isset($_POST['listok'])&&($_POST['listok'])){
                    $kyw = $_POST['kyw'];
                    $n = $_POST['n'];
                }else{
                    $kyw = "";   
                    $n = "";   
                }
                $dsbill = loadall_bill($kyw,$n);
                include './donhang/list_dh.php';
                break;
            case 'delete_bill':
                if(isset($_GET['id'])&&($_GET['id']>0)){
                    cart_delete($_GET['id']);
                    bill_delete($_GET['id']);
                }
                $dsbill = loadall_bill();
                include './donhang/list_dh.php';
                break;
            case 'update_bill':
                if(isset($_GET['id'])&&($_GET['id']>0)){
                    $bill= loadone_bill($_GET['id']);
                }
                $dsbill = loadall_bill();
                include './donhang/update_dh.php';
                break;
            case 'updatebill':
                if(isset($_POST['update_bill'])&&($_POST['update_bill'])){
                    $id = $_POST['id_bill'];
                    $ttdh = $_POST['ttdh'];

                    bill_update($id, $ttdh);
                }
                $dsbill = loadall_bill();  
                include './donhang/list_dh.php';
                break;

////////////thongke////////////////////////////////////////////////////////////////////////////////////////////




            case 'thongke':
                $dsthongke = load_thongke();
                include './thongke/list_thongke.php';
                break;
            case 'bieudo':
                $dsthongke = load_thongke();
                include './thongke/bieudo.php';
                break;
            
            default:
                include 'home.php';
                break;
        }
    }else{
        include 'home.php';
    }


    include 'footer.php';
?>  