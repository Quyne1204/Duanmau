<div class="container2">
    <div class="conten1">
        <?php include 'box_left.php';?>
            <div style="width:100%;">
                <div class="content6">
                    <h1>Sản Phẩm Chi Tiết</h1>
                    <div>
                        <?php extract($onesp);
                            echo '
                            <div class="tt" style="display:flex;">
                                <img style="margin-bottom:20px" src="./images/sanpham/'.$img.'">
                                <div class="ct_sp">
                                    <h1>'.$name.'</h1> 
                                    <p class="font20">Giá Bán : <span class="font30 color">$'.$price.'</span></p>
                                    <p class="font20 pd20">Đã được giảm <span class="font30 color"> 20%</span>  </p>
                                    <p class="font20 pd20">Có<span class="font20 color"> '.$luotxem.' </span>lượt yêu thích </p>
                                    <p class="font20 pd20">Ngày nhập kho: <span class="font20 color"> '.$date.' </span> </p>
                                    <form action="index.php?act=addtocart" method="POST">
                                        <input type="hidden" name="id" value="'.$id_sp.'">
                                        <input type="hidden" name="name" value="'.$name.'">
                                        <input type="hidden" name="img" value="'.$img.'">
                                        <input type="hidden" name="price" value="'.$price.'"><br>
                                        <input
                                            style="background:red;color:white;font-size:20px;width:200px;padding:10px;border:none;border-radius:20px"
                                            name="addtocart" type="submit" value="Thêm Vào Giỏ Hàng">
                                    </form>
                                    
                                </div>
                            </div>
                            <div style="font-size:20px;">'.$detail.'</div>
                            ';
                        ?>
                    </div>
                </div>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                <script>
                    $(document).ready(function(){
                            $("#cmt").load("view/binhluan/formcmt.php",{id_pro:<?=$id_sp?>});
                    });
                </script>
                <div class="content6" id="cmt">

                </div>
                <div class="content6">
                    <h1>Sản Phẩm Cùng Loại</h1>
                    <div class="sp_cl">
                        <?php
                            foreach ($sp_new as $sp) {
                                extract($sp);
                            $link = "index.php?act=detail&id_sp='.$id_sp.'&id_loai='.$id_dm.'"  ;
                            }
                            foreach ($sp_cungloai as $spcl) {
                                extract($spcl); 
                                echo '
                                    <li>
                                    <img style="width:60px;height:60px;" src="./images/sanpham/'.$img.'"></img>
                                        <a href="'.$link.'">'.$name.'</a>
                                    </li>
                                    ';
                            }
                        ?>
                    </div>    
                </div>

               
                
            </div>

    </div>

    <div class="clear"></div>

</div>