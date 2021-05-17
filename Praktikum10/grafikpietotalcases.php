<?php
include('koneksi.php'); //memanggil koneksi php
$query = mysqli_query($koneksi,"select * from tb_corona");  //query untuk mengambil data di tabel tb_corona
while($row = mysqli_fetch_array($query)){
	$countryother[] = $row['countryother'];
	$totalcases[] = $row['totalcases'];
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Grafik Bar Total Kasus 10 Negara Menggunakan Chart JS</title>
	<script type="text/javascript" src="Chart.js"></script>
</head>
<body>
	<div style="width: 800px;height: 800px">
		<canvas id="myChart"></canvas>
	</div>
 
 
	<script>
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'pie', // tipe grafik seperti diagram lingkaran /pie
			data: {
				labels: <?php echo json_encode($countryother); ?>,// menuliskan bagian data dari chart
				datasets: [{
					label: 'Grafik Pie Total Kasus 10 Negara',
					data: <?php echo json_encode($totalcases); ?>, // menuliskan bagian data dari chart
					backgroundColor: 'rgba(255, 99, 132, 0.2)',
					borderColor: 'rgba(255,99,132,1)',
					borderWidth: 1
					// memberi tampilan warna, border pada chart 
				}]
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