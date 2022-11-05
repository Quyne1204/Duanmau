<div class="box0">
    <h2>Quản lí Bình Luận</h2><br><br>
    <table>
        <thead>
            <tr>
                <td>Mã bình luận</td>
                <td>Nội dung</td>
                <td>Mã sản phẩm</td>
                <td>Tên người dùng</td>
                <td>Ngày bình luận</td>
            </tr>
        </thead>  

        <tbody>
           <?php 
                    foreach ($list_cmt as $cmt) {
                    extract($cmt);
                    $update_cmt ="index.php?act=update_cmt&id=".$id_cmt;
                    $delete_cmt ="index.php?act=delete_cmt&id=".$id_cmt;
                    echo '  <tr>
                            <td width="15%">'.$id_cmt.'</td>
                            <td width="30%">'.$noidung.'</td>
                            <td width="12%">'.$id_pro.'</td>
                            <td width="12%">'.$username.'</td>
                            <td width="12%">'.$ngaycmt.'</td>
                            <td>
                            <a href="'.$update_cmt.'"><button class="normal update">Update</button></a>
                            <a href="'.$delete_cmt.'"><button class="normal delete">Delete</button></a>
                            </td>
                            </tr>';
                }
           ?>
        </tbody>
    </table>
</div>