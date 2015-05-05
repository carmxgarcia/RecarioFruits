<!DOCTYPE html>

<?php
	require_once('mysql_connect.php');

	if(!empty($_POST["log_view"])) {
		$fname = $_POST["log_view"];
		$history_query = $conn->query("SELECT * from log WHERE fname='".$_POST["log_view"]."'");
		$edit_log = $history_query->fetch_all();
		$edit_times = $history_query->num_rows;
	}
?>

<html>
	<head>
		<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
		<title>
			Edit History
		</title>
	</head>
	<body>
		<h5 class="center">Fruit name: <?php echo $fname; ?> <a style="font-size:15px; margin:10px" href="index.php"> [Back]</a></h5>

		<table class="centered striped container">
			<thead>
				
				<tr class="green lighten-3">
					<th>Time of Update</th>
					<th>Price</th>
				</tr>
			</thead>
			<tbody>
				<?php
                	for ($i=0; $i < $edit_times; $i++) {
                		echo "
                			<tr>
                				<td>".$edit_log[$i][0]."</td>
                				<td>".$edit_log[$i][2]."</td>
                			</tr>
                		";
                	}
				?>
			</tbody>
		</table>
		
	</body>
</html>