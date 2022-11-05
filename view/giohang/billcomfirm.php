<div class="container2">
    <div class="conten1">
        <?php include 'view/box_left.php';?>
        <div style="width:100%;">
            <h1 style="color:red;text-align:center">Cảm ơn quý khách đã đặt hàng</h1>
            <div class="content6">
                <h1 style="padding:10px 10px">Thông tin đơn hàng</h1>
                <?php
                    if(isset($list_bill)&&is_array($list_bill)){
                        extract($list_bill);
                    }
                ?>
                <table width="100%">
                    <tr>
                        <td><h3>Mã đơn hàng:</h3></td>
                        <td><p class="font20">DHS-<?=$list_bill['id_bill']?></p></td>
                    </tr>
                    <tr>
                        <td><h3>Ngày đặt hàng:</h3></td>
                        <td><p  class="font20"><?=$list_bill['date']?></p></td>
                    </tr>
                
                </table>
            </div>
            <div class="content6">
                <h1 style="padding:10px 10px">Thông tin khách hàng</h1>
                <?php
                    if(isset($list_bill)&&is_array($list_bill)){
                        extract($list_bill);
                    }
                ?>
                <table width="100%">
                    <tr>
                        <td><h3>Tên người nhận:</h3></td>
                        <td><p class="font20"><?=$list_bill['bill_name']?></p></td>
                    </tr>
                    <tr>
                        <td><h3>Địa chỉ:</h3></td>
                        <td><p class="font20"><?=$list_bill['bill_diachi']?></p></td>
                    </tr>
                    <tr>
                        <td><h3>Số điện thoại</h3></td>
                        <td><p class="font20"><?=$list_bill['bill_sdt']?></p></td>
                    </tr>
                    <tr>
                        <td><h3>Tiền cần thu:</h3></td>
                        <td><p class="font20">$<?=$list_bill['total']?></p></td>
                    </tr>
                    <tr>
                        <td><h3>Phương thức thanh toán</h3></td>
                        <td><p class="font20"><?=$list_bill['bill_pttt']?></p></td>
                    </tr>
                
                </table>
            </div>
            <div class="content6">
                <h1 style="padding:10px 10px">Chi tiết giỏ hàng</h1>
                <table>
                <?php
                    bill_ct($ct_bill);
                ?>
                </table>
            </div>
            
            
        </div>
    </div>

    <div class="clear"></div>

</div>