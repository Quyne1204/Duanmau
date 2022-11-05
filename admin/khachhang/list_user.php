<div class="box0">
    <h2>Quản lí khách hàng</h2>
    <a href="index.php?act=adduser" ><button class="normal btn">Thêm khách hàng</button></a>
    <br><br>
    <table>
        <thead>
            <tr>
                <td>Mã KH </td>
                <td>Tài Khoản </td>
                <td>Mật khẩu </td>
                <td>Tên kh </td>
                <td>Email</td>
                <td>Địa chỉ</td>
                <td>Sdt</td>
                <td>Hình ảnh</td>
                <td>Vai trò</td>
            </tr>
        </thead>   
        <div>
            <form action="index.php?act=dsuser" class="tksp" method="post">
                <input type="text" name="kyw" style="width:200px;height:30px;float:left;margin-right:15px">
                <select name="vaitro" style="width:200px;height:30px;float:left;margin-right:15px">
                    <option value="" selected>Tất Cả</option>
                    <option value="1" >Nhân viên</option>
                    <option value="2" >Khách hàng</option>
                </select>
                <input type="submit" name="listok" value="OK" style="width:50px;height:30px"><br><br> 
            </form>
            </div>
        <tbody>
           <?php 
                    foreach ($list_user as $user) {
                    extract($user);
                    $update_user ="index.php?act=update_user&id=".$id_user;
                    $delete_user ="index.php?act=delete_user&id=".$id_user;
                    echo '  <tr>
                            <td width="5%">'.$id_user.'</td>
                            <td width="6%">'.$username.'</td>
                            <td width="6%">'.$password.'</td>
                            <td width="auto">'.$name.'</td>
                            <td width="13%">'.$email.'</td>
                            <td width="8%">'.$diachi.'</td>
                            <td width="8%">'.$sdt.'</td>';
                    if(isset($img)&&($img!="")){ 
                        echo '<td width="10%"><img style="border-radius:50px;padding-right:10px;" src="../images/user/'.$img.'" alt=""></td>';
                    }else{
                        echo '<td width="10%"></td>';
                    }
                    
                    if(isset($vaitro)&&($vaitro==1)){
                        echo '<td width="8%" style="padding-right:15px;">Nhân viên </td>';
                    }else if(isset($vaitro)&&($vaitro==2)){
                        echo '<td width="8%" style="padding-right:15px;">khách hàng </td>';
                    }
                        
                    echo '  <td>
                                <a href="'.$update_user.'"><button class="normal update">Update</button></a>
                                <a href="'.$delete_user.'"><button class="normal delete">Delete</button></a>
                            </td>
                            </tr>';

                }
           ?>
        </tbody>
    </table>
</div>