<?php
    if(is_array($sp)){
        extract($sp);
    }
?>
<div class="box0">
<h2>Sửa sản phẩm</h2>
    <form action="index.php?act=updatesp" method="post" enctype="multipart/form-data">
        <div>
            <p>MÃ HÀNG HÓA</p>
            <input type="text" disabled>
            <p>ĐƠN GIÁ</p>
            <input type="text" name="price" value="<?php echo $price ?>"><br><br>
            <img width="200px" src="../images/sanpham/<?php echo $img ?>" alt="">
            <p>HÌNH ẢNH</p> 
            <span><input type="file" name="img"></span>
            <p>NGÀY NHẬP</p>    
            <input type="date" name="date" value="<?php echo $date ?>">
            <p>MÔ TẢ</p>    
            <textarea name="detail" style="width:300px; height:100px;" ><?php echo $detail?></textarea>
                        
        </div>
        <div>
            <p>TÊN HÀNG HÓA</p>
            <input type="text" name="name" value="<?php echo $name ?>"> 
            <p>GIẢM GIÁ</p>
            <input type="text" name="sale" value="<?php echo $sale ?>">
            <p>LOẠI HÀNG </p>
            <select name="loaihang" >
                <?php
                     foreach ($list_dm as $danhmuc) {
                        extract($danhmuc);
                        if($id_loai == $id_dm) {
                            echo '<option value="'.$id_loai.'" selected>'.$name.'</option>';
                        }else{
                            echo '<option value="'.$id_loai.'">'.$name.'</option>';
                        }
                        
                     }
                ?>
            </select>
        </div>
        <input type="hidden" name="id_sp" value="<?php echo $id_sp ?> "> <br>  
        <div>   
        <input name="update_sp" class="normal btn" type="submit" value="Submit"></input>
        </div>
    </form>
</div>