<div class="container2">
    <div class="conten1">
        <?php include 'view/box_left.php';?>
            <div style="width:100%;">
                <div class="content6">
                    <h1>Giỏ hàng</h1>
                    <div>
                         <table style="text-align:center;">
                            
                            <?php
                                viewcart();
                            ?>
                            
                         </table>
                    </div>
                    <div>
                        <a href="index.php?act=bill">
                            <input type="button" value="Đồng ý đặt hàng">
                        </a>    
                        <a href="index.php?act=delcart">
                            <input type="button" value="Xóa giỏ hàng">
                        </a>
                        <a href="index.php?">
                            <input type="button" value="Mua tiếp">
                        </a>
                    </div>
                </div>
                
               
                
            </div>

    </div>

    <div class="clear"></div>

</div>