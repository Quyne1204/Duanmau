<div class="container2">
    <div class="conten1">
        <?php include 'view/box_left.php';?>
            <div style="width:100%;">
                <div class="content6">
                    <div style="text-align:center">
                        <h1>Cập Nhật Tài Khoản</h1>
                    </div>
                    <div>
                        <?php   
                            if(isset($_SESSION['user'])&&is_array($_SESSION['user'])){
                                extract($_SESSION['user']);
                            }
                        ?>
                    <form class="form1" action="index.php?act=edit_tk" method="POST" enctype="multipart/form-data">
                        <p>Tài Khoản</p>
                        <input type="text" name="username" required value="<?=$username?>">
                        <p>Mật Khẩu</p>
                        <input type="text" name="password" required value="<?=$password?>"><br>
                        <p>Họ và Tên</p>
                        <input type="text" name="name" value="<?=$name?>">
                        <p>Email</p>
                        <input type="email" name="email" value="<?=$email?>">
                        <p>Địa chỉ</p>
                        <input type="text" name="diachi" value="<?=$diachi?>">
                        <p>Số điện thoại</p>
                        <input type="text" name="sdt" value="<?=$sdt?>">
                        <p>Ảnh đại điện</p>
                        <?php 
                            if(isset($img)&&($img!="")){ 
                        ?>
                        <img style="width:100px;height:100px;border-radius:50px;margin-left:150px" src="images/user/<?=$img?>" alt=""><br>
                        <?php }?>
                        <input type="file" name="img" ><br>
                        <input type="hidden" name="id" value="<?=$id_user?>">
                        <input style="width:100px;margin-left:230px" type="submit" name="capnhat" Value="Cập Nhật"></input><br><br>
                        <?php 
                            if(isset($tb)&&($tb!="")){
                                echo $tb;
                            }
                        ?>
                    </form> 
                    </div>
                </div>  
            </div>
    </div>

    <div class="clear"></div>

</div>