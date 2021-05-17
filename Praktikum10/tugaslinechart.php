<?php
include('koneksi.php'); // Koneksi ke database
$query = mysqli_query($koneksi,"select * from tb_corona"); // query untuk mengambil data dari database
while($row = mysqli_fetch_array($query)){
	$countryother[] = $row['countryother'];
	$totalcases = $row['totalcases'];
	$newcases[] = $row['newcases'];
	$totaldeaths[] = $row['totaldeaths'];
	$newdeaths[] = $row['newdeaths'];
	$totalrecovered[] = $row['totalrecovered'];
	$activecases[] = $row['activecases'];
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Line Chart New Cases</title>
	<script type="text/javascript" src="Chart.js"></script> 
</head>
<body>
	<div style="width: 800px;height: 800px">
		<canvas id="myChart"></canvas>
	</div>


	<!-- Line chart new cases -->
	<script>
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'line', // tipe grafik seperti diagram garis
			data: {
				labels: <?php echo json_encode($countryother); ?>,
				datasets: [ // menuliskan bagian data dari chart

				{
					label: 'Total Cases',
					data: <?php echo json_encode($totalcases); ?>,
					backgroundColor: 'rgba(181, 54, 35, 1)',
					borderColor: 'rgba(255,99,132,1)',
					borderWidth: 1 // memberi tampilan warna, border pada chart 
				},
				{
					label: 'New Cases',
					data: <?php echo json_encode($newcases); ?>,
					backgroundColor: 'rgba(255, 99, 132, 1)',
					borderColor: 'rgba(255,99,132,1)',
					borderWidth: 1 // memberi tampilan warna, border pada chart 
				},
				{
					label: 'Total Deaths',
					data: <?php echo json_encode($totaldeaths); ?>,
					backgroundColor: 'rgba(66, 135, 245, 1)',
					borderColor: 'rgba(66, 135, 245,1)',
					borderWidth: 1 // memberi tampilan warna, border pada chart 
				},
				{
					label: 'New Deaths',
					data: <?php echo json_encode($newdeaths); ?>,
					backgroundColor: 'rgba(247, 152, 35, 1)',
					borderColor: 'rgba(247, 152, 35,1)',
					borderWidth: 1 // memberi tampilan warna, border pada chart 
				},
				{
					label: 'Total Recovered',
					data: <?php echo json_encode($totalrecovered); ?>,
					backgroundColor: 'rgba(0, 255, 0, 1)',
					borderColor: 'rgba(133, 245, 29,1)',
					borderWidth: 1 // memberi tampilan warna, border pada chart 
				},
				{
					label: 'Active Cases',
					data: <?php echo json_encode($activecases); ?>,
					backgroundColor: 'rgba(0, 247, 255, 1)',
					borderColor: 'rgba(0, 247, 255,1)',
					borderWidth: 1 // memberi tampilan warna, border pada chart 
				},
				]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script>	
</body>
</html>