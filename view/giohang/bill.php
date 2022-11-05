<div class="container2">
    <div class="conten1">
        <?php include 'view/box_left.php';?>
        <form method="POST" action="index.php?act=billcomfirm" style="width:100%;">
            <div class="content6">
                <h1>Thông tin đặt hàng</h1>
                <div>
                    <table style="font-size:20px;width:100%">
                        <?php
                            if(isset($_SESSION['user'])){
                                $name = $_SESSION['user']['name'];
                                $diachi = $_SESSION['user']['diachi'];
                                $sdt = $_SESSION['user']['sdt'];
                            }else{
                                $name = "";
                                $diachi = "";
                                $sdt = "";
                            }
                        ?>
                        <tr height="30px" style="margin:20px 0px">
                            <td>Người đặt hàng</td>
                            <td><input style="height:30px;width:100%;border-radius:50px;border:1px solid black;padding:0px 10px" 
                                        type="text" name="name"  value="<?=$name?>"></td>
                        </tr>
                        <tr height="30px" >
                            <td>Địa chỉ</td>
                            <td><input style="height:30px;width:100%;border-radius:50px;border:1px solid black;padding:0px 10px" 
                                        type="text" name="diachi" value="<?=$diachi?>"></td>
                        </tr>
                        <tr height="30px">
                            <td>Số điện thoại</td>
                            <td><input style="height:30px;width:100%;border-radius:50px;border:1px solid black;padding:0px 10px" 
                                        type="text" name="sdt" value="<?=$sdt?>"></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="content6">
                <h1>Phương thức thanh toán</h1>
                <div>
                    <table style="font-size:20px;width:100%">
                        <tr>
                            <td><input type="radio" name="pttt" value="Trả tiền khi nhận hàng" checked>Trả tiền khi nhận hàng</td>
                            <td><input type="radio" name="pttt" value="Chuyển khoản ngân hàng" >Chuyển khoản ngân hàng</td>
                            <td><input type="radio" name="pttt" value="Thanh toán Online" >Thanh toán Online</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="content6">
                <h1>Giỏ hàng</h1>
                <div>
                    <table style="text-align:center;">
                        <?php
                            viewcart();
                        ?>
                    </table>
                </div>
            </div>
            <div style="padding:10px 15px">
            <input type="hidden" name="id" value="">
                <a href="index.php?act=billcomfirm">
                    <input type="submit" value="Thanh toán" name="thanhtoan">
                </a>
            </div>
            
        </form>
    </div>

    <div class="clear"></div>

</div>