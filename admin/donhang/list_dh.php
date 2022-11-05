<div class="box0">
    <h2>Quản lí đơn hàng</h2>
    <br><br>
    
    <table>
        <thead>
            <tr>
                <th width="100px">Mã ĐH </th>
                <th width="250px">Khách hàng </th>
                <th width="150px">Số lượng hàng </th>
                <th>Giá trị đơn hàng </th>
                <th>Ngày đặt hàng </th>
                <th>Tình trạng</th>
            </tr>
        </thead>   
        <div>
            <form action="index.php?act=dsdh" class="tksp" method="post">
                <input type="text" name="kyw" style="width:200px;height:30px;float:left;margin-right:15px">
                <select name="n" style="width:200px;height:30px;float:left;margin-right:15px">
                    <option value="" selected>Tất Cả</option>
                    <option value="0" >Đang tạo đơn hàng</option>
                    <option value="1" >Đã xử lý </option>
                    <option value="2" >Đang giao hàng</option>
                    <option value="3" >Giao hàng thành công</option>
                </select>
                <input type="submit" name="listok" value="OK" style="width:50px;height:30px"><br><br> 
            </form>
        </div>
        <tbody>
           <?php 
                foreach ($dsbill as $bill) {
                    extract($bill);
                    $update_bill ="index.php?act=update_bill&id=".$id_bill;
                    $delete_bill ="index.php?act=delete_bill&id=".$id_bill;
                    $count = loadall_bill_count($bill['id_bill']);
                    $ttdh = get_ttdh($bill['bill_status']);
                    $kh = $bill_name.
                            '<br>'.$bill_diachi.
                            '<br>'.$bill_sdt;
                    echo '  <tr>
                                <td>DHS-'.$id_bill.'</td>
                                <td>'.$kh.'</td>
                                <td>'.$count.'</td>
                                <td>$'.$total.'</td>
                                <td>'.$date.'</td>
                                <td>'.$ttdh.'</td>
                                <td>
                                    <a href="'.$update_bill.'"><button class="normal update">Update</button></a>
                                    <a href="'.$delete_bill.'"><button class="normal delete">Delete</button></a>
                                </td>
                            </tr>';
                }   
           ?>
        </tbody>
    </table>
</div>