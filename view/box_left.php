<div class="pro1">
    <p>Đăng Nhập</p>
    <div  style="height:100%;width:80%;margin:auto;"> 
    <?php 
        if(isset($_SESSION['user'])){
            extract($_SESSION['user']);
    ?>
        <div class="dangnhap"> 
            <div class="font20 "><br>
                Xin chào <br> 
                <div style="display:flex">
                    <?php 
                        if(isset($img)&&($img!="")){ 
                    ?>
                        <img style="width:60px;height:60px;border-radius:50px" src="images/user/<?=$img?>" alt="">
                    <?php }else{ ?>
                       <img style="width:60px;height:60px;border-radius:50px" src="images/user.png" alt="">
                    <?php }?>
                    <h1><?=$username?></h1>
                </div>
            </div>
            <div style="margin-bottom:10px">
            <li class="mr font20"><a href="index.php?act=edit_tk">Cập nhật tài khoản</a></li>
            <?php
                if($vaitro!=1){
            ?>
            <li class="mr font20"><a href="index.php?act=mybill">Đơn hàng của bạn</a></li>
            <?php    
                }
            ?>
            <?php
                if($vaitro==1){
            ?>
            <li class="mr font20"><a href="admin/index.php">Đăng nhập admin</a></li>
            <?php    
                }
            ?>
            
            <li class="mr font20"><a href="index.php?act=dangxuat">Đăng xuất</a></li>
            </div>
        </div>

    <?php 
        }else{
    ?>
        <form  class="mr" action="index.php?act=dangnhap" method="POST">
            <span class="font20 mr">Tài Khoản</span><br>
            <input class="wh mr" type="text" name="username"><br>
            <span class="font20 mr">Mật Khẩu</span><br>
            <input class="wh mr" type="password" name="password"><br><br>
            <li><a href="index.php?act=quenpass">Quên mật khẩu</a></li><br>
            <span class="font20 mr">Chưa có tài khoản, </span><a href="index.php?act=dangky" style="text-decoration: none;"><span >đăng ký</span></a>
            <input style="width:100px;height:30px;margin:10px 70px;margin-top: 10px;" type="submit" name="login" value="Đăng Nhập">
            <br>
            <span style="color:red;">
                <?php
                    if(isset($tb)&&($tb!="")){
                        echo $tb;
                        echo '<br><br>';
                    }
                ?>
            </span>
        </form>
    <?php 
        }
    ?>
    </div>

    <p>Tìm Kiếm Sản Phẩm</p>
    <form class="flex" action="index.php?act=sanpham" method="POST">
        <input style="width:70%;height:30px;margin:10px 0px" type="text" name="kyw">
        <input style="width:30%;height:30px;margin:10px 0px" type="submit" name="listok" value="Search">
    </form>
    <p>Danh Mục Sản Phẩm</p>
    <div>
        <?php
        foreach ($dm_all as $dm) {
            extract($dm);   
            echo '
                <div class="top10">
                    <ul>
                        <li><a href="index.php?act=sanpham&id_loai='.$id_loai.'">'.$name.'</a></li>
                    </ul>
                </div> ';

        } ?>
    </div>
            

    <p>Top 7 yêu thích </p>
    <?php
        foreach ($sp_top10 as $sp) {
            extract($sp);   
            echo '
                <div class="top10">
                    <a href="index.php?act=detail&id_sp='.$id_sp.'&id_loai='.$id_dm.'">
                        <img style="width:60px;height:60px;" src="./images/sanpham/'.$img.'">
                    </a>
                    <div style="padding-left:10px;">
                        <a href="index.php?act=detail&id_sp='.$id_sp.'&id_loai='.$id_dm.'">
                            <span>'.$name.'</span><br>
                        </a>
                        <span style="color:red">$'.$price.'</span>
                    </div>
                </div>
                ';

        }
        ?>
</div>