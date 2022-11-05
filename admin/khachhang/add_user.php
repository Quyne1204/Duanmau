<div class="box0">
<h2>Thêm khách hàng</h2>
    <form action="index.php?act=adduser" method="post" enctype="multipart/form-data">
        <div>
            <p>Tên khách hàng</p>
            <input type="text" name="name" >
            <p>Email</p>
            <input type="text" name="email">
            <p>Địa chỉ</p>
            <input type="text" name="diachi">
            <p>Hình ảnh</p> 
            <span><input type="file" name="img"></span><br>
            <?php 
                if(isset($tb)&&($tb!="")){
                    echo $tb;
                }
            ?>
        </div>
        <div>
            <p>Tên tài khoản</p>
            <input type="text" name="username" required> 
            <p>Mật khẩu</p>
            <input type="text" name="password" required>
            <p>Số điện thoại</p>
            <input type="text" name="sdt">
            <p>Vai Trò</p>
            <select name="vaitro" >
                <option value="2">Khách hàng</option>
                <option value="1">Nhân viên</option>
            </select>
        </div>
        <div>
            <input name="add_user" class="normal btn" type="submit" value="Submit"></input>
            <a href="index.php?act=dsuser"><input class="normal btn" type="button" value="Danh Sách"></input></a>   
        </div>
    </form>
</div>