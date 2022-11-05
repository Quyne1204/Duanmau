<div class="container2">
    <div class="conten1">
        <?php include 'view/box_left.php';?>
            <div style="width:100%;">
                <div class="content6">
                    <h1>Đơn hàng của bạn</h1>
                    <table style="text-align:center">
                        <tr>
                            <th width="150px">Mã đơn hàng </th>
                            <th width="80px">Ngày đặt</th>
                            <th width="200px">Số lượng mặt hàng</th>
                            <th width="120px"> Tổng giá trị</th>
                            <th width="220px">Tình trạng đơn hàng</th>
                        </tr>
                        <?php
                            if(is_array($dsbill)){
                                foreach($dsbill as $bill){
                                extract($bill);
                                $ttdh = get_ttdh($bill['bill_status']);
                                $count = loadall_bill_count($bill['id_bill']);
                                echo '
                                    <tr>
                                        <td width="%">DHS-'.$bill['id_bill'].'</td>
                                        <td width="">'.$bill['date'].'</td>
                                        <td>'.$count.'</td>
                                        <td>'.$bill['total'].'</td>
                                        <td>'.$ttdh.'</td>
                                    </tr>
                                ';
                                }
                            }
                        ?>
                    </table>
                </div>
                
               
                
            </div>

    </div>

    <div class="clear"></div>

</div>