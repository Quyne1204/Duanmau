<div class="box0">
    <h2>Quản lí hàng hóa</h2>
    <a href="index.php?act=addsp" ><button class="normal btn">Thêm hàng hóa</button></a>
    <br><br>
    <table>
        <thead>
            <tr>
                        <td>Mã hh</td>
                        <td>Tên hàng hóa</td>
                        <td>Đơn giá</td>
                        <td>Lượt xem</td>
                        <td>Ngày nhập</td>
                        <td>Giảm giá</td>
                        <td>Ảnh</td>
                        <td>Mô tả</td>
            </tr>
        </thead>   
            <div>
            <form action="index.php?act=dssp" class="tksp" method="post">
                    <input type="text" name="kyw" style="width:200px;height:30px;float:left;margin-right:15px">
                    <select name="id_loai" style="width:200px;height:30px;float:left;margin-right:15px">
                        <option value="0" selected>Tất Cả</option>
                        <?php
                            foreach ($list_dm as $danhmuc) {
                                extract($danhmuc);
                                echo '<option value="'.$id_loai.'">'.$name.'</option>';
                            }
                        ?>
                    </select>
                <input type="submit" name="listok" value="OK" style="width:50px;height:30px"><br><br> 
            </form>
            </div>
        <tbody>
           <?php 
                    foreach ($list_sp as $sanpham) {
                    extract($sanpham);
                    $update_sp ="index.php?act=update_sp&id=".$id_sp;
                    $delete_sp ="index.php?act=delete_sp&id=".$id_sp;
                    echo '  <tr>
                            <td width="5%">'.$id_sp.'</td>
                            <td width="10%">'.$name.'</td>
                            <td width="auto">$'.$price.'</td>
                            <td width="auto">'.$luotxem.'</td>
                            <td width="auto">'.$date.'</td>
                            <td width="auto">'.$sale.'</td>  
                            <td width="15%" style="padding-right:10px;"><img src="../images/sanpham/'.$img.'" ></td>
                            <td width="20%">'.$detail.'</td>
                            <td>
                            <a href="'.$update_sp.'"><button class="normal update">Update</button></a>
                            <a href="'.$delete_sp.'"><button class="normal delete">Delete</button></a>
                            </td>
                            </tr>';
                }
           ?>
        </tbody>
    </table>
</div>