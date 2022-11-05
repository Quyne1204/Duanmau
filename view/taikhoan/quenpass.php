<div class="container2">
    <div class="conten1">
        <?php include 'view/box_left.php';?>
            <div style="width:100%;">
                <div class="content6">
                    <div style="text-align:center">
                        <h1>Quên Mật Khẩu</h1>
                    </div>
                    <div>
                    <form class="form1" action="index.php?act=quenpass" method="POST" >
                        <p>Email</p>
                        <input type="email" name="email" >
                        <input style="width:100px;margin-left:300px" type="submit" name="quenpass" Value="Gửi"></input><br><br>
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