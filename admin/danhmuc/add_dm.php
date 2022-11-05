<div class="box0">
<h1>Thêm sản phẩm</h1><br>
    <form action="index.php?act=adddm" method="POST">
    <div>
        <p>MÃ HÀNG HÓA</p><br>
        <input type="text"  disabled><br><br>
        <p>TÊN LOẠI HÀNG</p><br>
        <input type="text" name="name">  <br>   <br> 
        <input name="add_dm" class="normal btn" type="submit" value="Thêm"></input> <br>  <br> 
        <a href="index.php?act=dsdm"><input class="normal btn" type="button" value="Danh Sách"></input></a> 
        <?php 
                            if(isset($tb)&&($tb!="")){
                                echo $tb;
                            }
                        ?>    
    </div>
    </form>
</div>