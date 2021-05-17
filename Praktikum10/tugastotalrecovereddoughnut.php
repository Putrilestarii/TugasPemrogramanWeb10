<?php
include('koneksi.php'); // Koneksi ke database
$query = mysqli_query($koneksi,"select * from tb_corona"); // query untuk mengambil data dari database
while($row = mysqli_fetch_array($query)){
	$countryother[] = $row['countryother'];
	$totalrecovered[] = $row['totalrecovered'];
}
?>
<!doctype html>
<html>

<head>
	<title>Doughnut Chart Total Recovered</title>
	<script type="text/javascript" src="Chart.js"></script> 
</head>

<body>
	<div id="canvas-holder" style="width:50%">
		<canvas id="chart-area"></canvas>
	</div>
	<script>
		var config = {
			type: 'doughnut', // Mendeklarasi tipe grafik seperti diagram donat
			data: {
				datasets: [{
					data:<?php echo json_encode($totalrecovered); ?>,
					backgroundColor: [ // Memeberi tampilan warana pada chart
					'rgba(181, 54, 35, 1)',
					' rgba(69, 241, 151, 1)',
					' rgba(210, 208, 35, 1)',
					' rgba(83, 208, 255, 1)',
					'rgba(15, 122, 66, 1)',
					'rgba(255, 99, 255, 1)',
					'rgba(255, 160, 86, 1)',
					'rgba(31, 255, 0, 1)',
					'rgba(31, 255, 255, 1)',
					'rgba(95, 0, 255, 1)'
					],
					borderColor: [ // memberi tampilan warna border pada chart 
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(235, 64, 52, 0.2)',
					'rgba(245, 93, 5, 0.2)',
					'rgba(240, 221, 10, 0.2)',
					'rgba(162, 255, 0, 0.2)',
					'rgba(0, 230, 122, 0.2)',
					'rgba(111, 0, 230, 0.2)'
					],
					label: 'Total Recovered COVID-19'
				}],
				labels: <?php echo json_encode($countryother); ?>},
			options: {
				responsive: true
			}
		};

		window.onload = function() {
			var ctx = document.getElementById('chart-area').getContext('2d');
			window.myPie = new Chart(ctx, config);
		};

		document.getElementById('randomizeData').addEventListener('click', function() {
			config.data.datasets.forEach(function(dataset) {
				dataset.data = dataset.data.map(function() {
					return randomScalingFactor();
				});
			});

			window.myPie.update();
		});

		var colorNames = Object.keys(window.chartColors);
		document.getElementById('addDataset').addEventListener('click', function() {
			var newDataset = {
				backgroundColor: [],
				data: [],
				label: 'New dataset ' + config.data.datasets.length,
			};

			for (var index = 0; index < config.data.labels.length; ++index) {
				newDataset.data.push(randomScalingFactor());

				var colorName = colorNames[index % colorNames.length];
				var newColor = window.chartColors[colorName];
				newDataset.backgroundColor.push(newColor);
			}

			config.data.datasets.push(newDataset);
			window.myPie.update();
		});

		document.getElementById('removeDataset').addEventListener('click', function() {
			config.data.datasets.splice(0, 1);
			window.myPie.update();
		});
	</script>
</body>