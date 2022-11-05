<?php
    if(is_array($cmt)){
        extract($cmt);
    }
?>
<div class="box0">
<h2>Sửa Bình Luận</h2><br><br>
    <form action="index.php?act=updatecmt" method="post" enctype="multipart/form-data">
        <div>
            <p>Tên người dùng</p>
            <input type="text" name="username"  value="<?php echo $username?>">
            <p>Mã sản phẩm</p>
            <input type="text" name="id_pro" value="<?php echo $id_pro?>">
            <p>Ngày bình luận</p>
            <input type="date" name="date" value="<?php echo $ngaycmt?>"> 
            <p>Nội dung</p>
            <textarea name="noidung" style="width:300px; height:100px;" ><?php echo $noidung?></textarea>
            
        </div>
        <input type="hidden" name="id_cmt" value="<?php echo $id_cmt ?>"> <br>  
        <div>   
        <input name="update_cmt" class="normal btn" type="submit" value="Submit"></input>
        </div>
    </form>
</div>