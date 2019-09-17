<?php
	/* Database connection settings */
	$host = 'localhost';
	$user = 'root';
	$pass = 'YES';
	$db = 'mysql';
	$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);

	$data1T = '';
	$data1H = '';
	$data2T = '';
	$data2H = '';
	$data3T = '';
	$data3H = '';

	//query to get data from the table
	$sql = "SELECT * FROM datas";
    $result = mysqli_query($mysqli, $sql);

	//loop through the returned data
	while ($row = mysqli_fetch_array($result)) {

		$data1T = $data1T . '"'. $row['data1T'].'",';
		$data1H = $data1H . '"'. $row['data1H'].'",';
		$data2T = $data2T . '"'. $row['data2T'].'",';
		$data2H = $data2H . '"'. $row['data2H'].'",';
		$data3T = $data3T . '"'. $row['data3T'].'",';
		$data3H = $data3H . '"'. $row['data3H'].'",';
	}

	$data1T = trim($data1T,",");
	$data1H = trim($data1H,",");
	$data2T = trim($data2T,",");
	$data2H = trim($data2H,",");
	$data3T = trim($data3T,",");
	$data3H = trim($data3H,",");
?>

<!DOCTYPE html>
<html lang="en"><head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <title>My Chart.js Chart</title>
</head>
<body>
  <div class="container"><iframe class="chartjs-hidden-iframe" tabindex="-1" style="display: block; overflow: hidden; border: 0px; margin: 0px; top: 0px; left: 0px; bottom: 0px; right: 0px; height: 100%; width: 100%; position: absolute; pointer-events: none; z-index: -1;"></iframe>
    <canvas id="myChart" width="1440" height="720" style="display: block; height: 360px; width: 720px;"></canvas>
  </div>


 






<script>
    let myChart = document.getElementById('myChart').getContext('2d');

    // Global Options
    Chart.defaults.global.defaultFontFamily = 'Lato';
    Chart.defaults.global.defaultFontSize = 18;
    Chart.defaults.global.defaultFontColor = '#777';

    let massPopChart = new Chart(myChart, {
      type:'bar', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
      data:{
        labels:['Sensor 1 Temperature(°F)', 'Sensor 1 Humidity(%)', 'Sensor 2 Temperature(°F)','Sensor 2 Humidity(%)', 'Sensor 3 Temperature(°F)', 'Sensor 3 Humidity(%)'],
        datasets:[{
        //  label:'Sensor1',
          data:[
            80,
            50,
            38,
            90,
            75,
            26,
          ],
          //backgroundColor:'green',
          backgroundColor:[
            'rgba(255, 99, 132, 0.6)',
            'rgba(255, 99, 132, 0.6)',
            'rgba(54, 162, 235, 0.6)',
            'rgba(54, 162, 235, 0.6)',
            'rgba(255, 206, 86, 0.6)',
            'rgba(255, 206, 86, 0.6)',
          ],
          borderWidth:1,
          borderColor:'#777',
          hoverBorderWidth:3,
          hoverBorderColor:'#000'
        }]
      },
      options:{
        title:{
          display:true,
          text:'Humidty and Temperature in three rooms',
          fontSize:25
        },
        legend:{
          display:false,
          position:'right',
          labels:{
            fontColor:'#000'
          } 
        },
        
        layout:{
          padding:{
            left:0,
            right:70,
            bottom:70,
            top:0
          }
        },
        tooltips:{
          enabled:true
        }
      }
    });
  </script>



</body></html>