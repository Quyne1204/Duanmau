
<div class="banner">
            <!-- Slideshow container -->
            <div class="slideshow-container">

                <!-- Full-width images with number and caption text -->
                <div class="mySlides fade">
                    <div class="numbertext">1 / 3</div>
                    <img src="./images/logo/banner1.jpg" style="width:100%">
                </div>

                <div class="mySlides fade">
                    <div class="numbertext">2 / 3</div>
                    <img src="./images/logo/banner2.jpg" style="width:100%">
                </div>

                <div class="mySlides fade">
                    <div class="numbertext">3 / 3</div>
                    <img src="./images/logo/banner3.jpg" style="width:100%">
                </div>


            </div>

        </div>
<div class="container2">
    <div class="span1">
        <span class="">Danh Mục Sản Phẩm</span>
    </div>
    <div class="conten1">
    <?php include 'box_left.php';?>

        <div class="grid-container">
            
            <?php
                foreach ($sp_new as $sp) {
                    extract($sp);   
                    echo '
                        <div class="pro">
                            <a href="index.php?act=detail&id_sp='.$id_sp.'&id_loai='.$id_dm.'">
                            <img style="width:200px;height:200px" src="./images/sanpham/'.$img.'">
                            </a>
                            <div id="detail">
                                <span style="color:red;font-size: 30px;">$'.$price.'</span>
                                <span style="font-size:20px;">Sale '.$sale.'%</span>
                                <a style="text-decoration: none;color:black;" href="index.php?act=detail&id_sp='.$id_sp.'&id_loai='.$id_dm.'">
                                    <h1 style="font-size: 20px;">'.$name.'</h1>
                                </a>
                                <form action="index.php?act=addtocart" method="POST">
                                        <input type="hidden" name="id" value="'.$id_sp.'">
                                        <input type="hidden" name="name" value="'.$name.'">
                                        <input type="hidden" name="img" value="'.$img.'">
                                        <input type="hidden" name="price" value="'.$price.'"><br>
                                        <input
                                            style="background:red;color:white;font-size:10px;width:120px;padding:10px;border:none;border-radius:20px"
                                            name="addtocart" type="submit" value="Thêm Vào Giỏ Hàng">
                                    </form>
                            </div>

                        </div>
                        ';

                }
            ?>
            
        </div>

    </div>

    <div class="clear"></div>

</div>