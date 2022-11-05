<?php
    function viewcart(){
        $tong = 0;
        $i = 0;
        echo '<tr style="font-size:20px,font-weight:bold">
                <th width="7%">Hình</th>
                <th width="10%">Sản phẩm </th>
                <th width="5%">Đơn giá</th>
                <th width="5%">Số lượng</th>
                <th width="10%">Thành tiền</th>
                <th width="5%">Thao tác</th>
                </tr>';
        foreach ($_SESSION['mycart'] as $cart) {
            $ttien = $cart[3] * $cart[4];
            $tong += $ttien;

            $xoasp= '<a href="index.php?act=delcart&id='.$i.'"><input type="button" value="Xóa"></a>' ;
            echo'
            <tr>
                <td width="7%"><img style="width:100px;height: 100px;border-radius:50px" src="images/sanpham/'.$cart[2].'"></td>
                <td width="10%">'.$cart[1].' </td>
                <td width="5%">$'.$cart[3].'</td>
                <td width="5%">'.$cart[4].'</td>
                <td width="10%">$'.$ttien.'</td>
                <td width="5%">'.$xoasp.'</td>
            </tr>
            ';
            $i +=1;
        }
        echo'
            <tr>
                <td colspan="4">Tổng đơn hàng</td>
                <td>$'.$tong.'</td>
            </tr>
            ';
    }
function tongdonhang(){
        $tong = 0;
        foreach ($_SESSION['mycart'] as $cart) {
            $ttien = $cart[3] * $cart[4];
            $tong += $ttien;
    }
    return $tong;
}
function insert_bill($iduser,$name,$diachi,$sdt,$date,$pttt,$tongdonhang){
        $sql = "insert into bill(iduser,bill_name,bill_diachi,bill_sdt,date,bill_pttt,total) 
                values('$iduser','$name','$diachi','$sdt','$date','$pttt','$tongdonhang')";
        return pdo_execute_return_lastInsertId($sql);
}
function bill_update($id, $ttdh){
    $sql = "update bill set bill_status=$ttdh where id_bill=".$id;
    pdo_execute($sql);
}
function bill_delete($id){
    $sql = "delete from bill where id_bill=$id " ;
     pdo_execute($sql);
}
function cart_delete($id){
    $sql = "delete from cart where idbill=$id " ;
     pdo_execute($sql);
}
function insert_cart($iduser,$idpro,$img,$name,$price,$soluong,$thanhtien,$idbill){
        $sql = "insert into cart(iduser,idpro,img,name,price,soluong,thanhtien,idbill) 
                values('$iduser','$idpro','$img','$name','$price','$soluong','$thanhtien','$idbill')";
        return pdo_execute($sql);
}
function loadone_bill($id){
    $sql = "select * from bill where id_bill=".$id;
    $bill = pdo_query_one($sql);
    return $bill;
}
function loadall_cart($id){
    $sql = "select * from cart where idbill=".$id;
    $bill = pdo_query($sql);
    return $bill;
}
function loadall_bill($kyw="",$n=0){
    $sql = "select * from bill where 1";
    if($kyw!=""){
        $sql.= " and id_bill like '%".$kyw."%'" ;
    }else if($n!=""){
        $sql.=" and bill_status='".$n."'";
    }
    $sql.= " order by id_bill desc";
    $dsbill = pdo_query($sql);
    return $dsbill;
}
function loadall_bill_count($id){
    $sql = "select * from cart where idbill=".$id;
    $dsbill = pdo_query($sql);
    return sizeof($dsbill);
}
function get_ttdh($n){
    switch ($n) {
        case '0':
            $tt = "Đang tạo đơn hàng";
            break;
        case '1':
            $tt = "Đã xử lý ";
            break;
        case '2':
            $tt = "Đang giao hàng ";
            break;
        case '3':
            $tt = "Giao hàng thành công";
            break;
        
        default:
            $tt = "Đang tạo đơn hàng";
            break;
    }
    return $tt;
}
function bill_ct($list_bill){
    $tong = 0;
    $i = 0;
    echo '<tr style="">
            <th width="7%">Hình</th>
            <th width="10%">Sản phẩm </th>
            <th width="5%">Đơn giá</th>
            <th width="5%">Số lượng</th>
            <th width="10%">Thành tiền</th>
        </tr>';
    foreach ($list_bill as $cart){
        $tong += $cart['thanhtien'];

        echo'
        <tr>
            <td width="7%"><img style="width:100px;height: 100px;border-radius:50px" src="images/sanpham/'.$cart['img'].'"></td>
            <td width="10%">'.$cart['name'].' </td>
            <td width="5%">$'.$cart['price'].'</td>
            <td width="5%">'.$cart['soluong'].'</td>
            <td width="10%">$'.$cart['thanhtien'].'</td>
        </tr>
        ';
        $i +=1;
    }
    echo'
        <tr>
            <td colspan="4">Tổng đơn hàng</td>
            <td>$'.$tong.'</td>
        </tr>
        ';
}
function load_thongke(){
    $sql="select danhmuc.id_loai as madm, danhmuc.name as tendm, count(sanpham.id_sp) as countsp, min(sanpham.price) as minprice, max(sanpham.price) as maxprice, avg(sanpham.price) as tbprice";
    $sql.=" from sanpham left join danhmuc on danhmuc.id_loai = sanpham.id_dm";
    $sql.=" group by danhmuc.id_loai order by danhmuc.id_loai desc";
    $dsthongke = pdo_query($sql);
    return $dsthongke;
}
?>