<div class="box0">
    <h2>Quản lí loại hàng</h2>
    <a href="index.php?act=adddm" ><button class="normal btn">Thêm loại hàng</button></a>
    <br><br>
    <table>
        <thead>
            <tr>
                <td>Mã loại</td>
                <td>Tên loại</td>
            </tr>
        </thead>   
            
        <tbody>
           <?php 
                    foreach ($list_dm as $danhmuc) {
                    extract($danhmuc);
                    $update_dm ="index.php?act=update_dm&id=".$id_loai;
                    $delete_dm ="index.php?act=delete_dm&id=".$id_loai;
                    echo '  <tr>
                            <td width="15%">'.$id_loai.'</td>
                            <td width="60%">'.$name.'</td>
                            <td>
                            <a href="'.$update_dm.'"><button class="normal update">Update</button></a>
                            <a href="'.$delete_dm.'"><button class="normal delete">Delete</button></a>
                            </td>
                            </tr>';
                }
           ?>
        </tbody>
    </table>
</div>