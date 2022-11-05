<div class="box0">
<h2>Thêm sản phẩm</h2>
    <form action="index.php?act=addsp" method="post" enctype="multipart/form-data">
        <div>
            <p>MÃ HÀNG HÓA</p>
            <input type="text" disabled>
            <p>ĐƠN GIÁ</p>
            <input type="text" name="price">
            <p>HÌNH ẢNH</p> 
            <span><input type="file" name="img"></span>
            <p>NGÀY NHẬP</p>    
            <input type="date" name="date">
            <p>MÔ TẢ</p>    
            <textarea name="detail" style="width:300px; height:100px;"></textarea><br><br>
            <?php 
                if(isset($tb)&&($tb!="")){
                    echo $tb;
                }
            ?>
        </div>
        <div>
            <p>TÊN HÀNG HÓA</p>
            <input type="text" name="name"> 
            <p>GIẢM GIÁ</p>
            <input type="text" name="sale">
            <p>LOẠI HÀNG </p>
            <select name="loaihang" >
                <?php
                     foreach ($list_dm as $danhmuc) {
                        extract($danhmuc);
                        echo '<option value="'.$id_loai.'">'.$name.'</option>';
                     }
                ?>
            </select>
        </div>
        <div>
            <input name="add_sp" class="normal btn" type="submit" value="Submit"></input>
            <a href="index.php?act=dssp"><input class="normal btn" type="button" value="Danh Sách"></input></a>   
        </div>
    </form>
</div>