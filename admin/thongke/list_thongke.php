<div class="box0">
    <h2>Thống kê</h2>
    <br><br>
    <table>
        <thead>
            <tr>
                <th width="5%">STT</th>
                <th width="10%">Loại hàng</th>
                <th width="10%">Số lượng</th>
                <th width="15%">Giá cao nhất</th>
                <th width="15%">Giá thấp nhất</th>
                <th width="20%">Giá trung bình</th>
            </tr>
        </thead>   
            
        <tbody>
            <?php 
                foreach($dsthongke as $tk){
                    extract($tk);
                    echo '
                        <tr>
                            <td>'.$madm.'</td>
                            <td>'.$tendm.'</td>
                            <td>'.$countsp.'</td>
                            <td>'.$maxprice.'</td>
                            <td>'.$minprice.'</td>
                            <td>'.$tbprice.'</td>
                        </tr>
                    ';
                }
            ?>
        </tbody>
    </table>
    <div><a href="index.php?act=bieudo"><input type="button" value="Xem biểu đồ"></a></div>
</div>