<div class="container2">
    <div class="conten1">
        <?php include 'view/box_left.php';?>
            <div style="width:100%;">
                <div class="content6">
                    <div style="text-align:center">
                        <h1>Đăng Ký Tài Khoản</h1>
                    </div>
                    <div>
                    <form class="form1" action="index.php?act=dangky" method="POST" >
                        <p>Tài Khoản</p>
                        <input type="text" name="username" required >
                        <p>Email</p>
                        <input type="email" name="email" >
                        <p>Mật Khẩu</p>
                        <input type="password" name="password" required ><br>
                        <input style="width:100px;margin-left:300px" type="submit" name="dangky" Value="Đăng Ký"></input><br><br>
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