<?php
    if(is_array($dm)){
        extract($dm);
    }
?>
<div class="box0">
<h1>Sửa sản phẩm</h1>
    <form action="index.php?act=updatedm" method="POST">
    <div>
        <p>MÃ HÀNG HÓA</p><br>
        <input type="text"  disabled><br><br>
        <p>TÊN LOẠI HÀNG</p><br>
        <input type="text" name="name" value="<?php if(isset($name)&&($name!="")){echo $name ;}?> ">   <br>   
        <input type="hidden" name="id_dm" value="<?php if(isset($id_loai)&&($id_loai!="")){echo $id_loai ;}?> "> <br>     
        <input name="update_dm" class="normal btn" type="submit" value="Sửa"></input>    
    </div>
    </form>
</div>