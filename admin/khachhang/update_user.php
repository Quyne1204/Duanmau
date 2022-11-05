<?php
    if(is_array($user)){
        extract($user);
    }
?>
<div class="box0">
<h2>Sửa thông tin khách hàng</h2><br><br>
    <form action="index.php?act=updateuser" method="post" enctype="multipart/form-data">
        <div>
            <p>Tên khách hàng</p>
            <input type="text" name="name"  value="<?php echo $name?>">
            <p>Email</p>
            <input type="text" name="email" value="<?php echo $email?>">
            <p>Địa chỉ</p>
            <input type="text" name="diachi" value="<?php echo $diachi?>">
            <p>Hình ảnh</p> 
            <span><input type="file" name="img"></span>
            <img width="200px" src="../images/user/<?php echo $img ?>" alt="">
        </div>
        <div>
            <p>Tên tài khoản</p>
            <input type="text" name="username" required value="<?php echo $username?>"> 
            <p>Mật khẩu</p>
            <input type="text" name="password" required value="<?php echo $password?>">
            <p>Số điện thoại</p>
            <input type="text" name="sdt" value="<?php echo $sdt?>">
            <p>Vai Trò</p>
            <select name="vaitro" >
                <?php
                        if($vaitro == 1) {
                            echo '<option value="1" selected>Nhân viên</option>';
                            echo '<option value="2">Khách hàng</option>';
                        }else if($vaitro == 2){
                            echo '<option value="1">Nhân viên</option>';
                            echo '<option value="2" selected>Khách hàng</option>';
                        }
                ?>
            </select>
        </div>
        <input type="hidden" name="id_user" value="<?php echo $id_user ?>"> <br>  
        <div>   
        <input name="update_user" class="normal btn" type="submit" value="Submit"></input>
        </div>
    </form>
</div>