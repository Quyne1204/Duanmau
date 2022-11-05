<h1>Biểu đồ thống kê</h1>

<div id="piechart"></div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['Danh Mục', 'Số lượng sản phẩm'],
  <?php 
    $tongdm = count($dsthongke);
    $i = 1;
    $dauphay="";
    foreach ($dsthongke as $tk) {
        extract($tk);
        if($i == $tongdm){
            $dauphay="";
        }else{
            $dauphay=",";
        }
        echo "
            ['".$tendm."', ".$countsp."]".$dauphay;
        $i+=1;

    }
  ?>
]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'Danh mục', 'width':550, 'height':400};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
</script>