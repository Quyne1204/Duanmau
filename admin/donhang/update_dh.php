<?php
    if(is_array($bill)){
        extract($bill);
    }
?>
<div class="box0">
<h1>Sửa sản phẩm</h1>
    <form action="index.php?act=updatebill" method="POST">
    <div>
        <p>Mã đơn hàng</p><br>
        <input type="text"  disabled><br><br>
        <p>Tình trạng đơn hàng</p><br>
        <input type="text" name="ttdh" value="<?php if(isset($bill_status)&&($bill_status!="")){echo $bill_status ;}?> ">   <br>   
        <input type="hidden" name="id_bill" value="<?php if(isset($id_bill)&&($id_bill!="")){echo $id_bill ;}?> "> <br>     
        <input name="update_bill" class="normal btn" type="submit" value="Sửa"></input>    
    </div>
    </form>
</div>