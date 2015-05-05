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
		<title>
			Edit History
		</title>
	</head>
	<body>
		Fruit name: <?php echo $fname; ?>
		<table>
			<thead>
				<tr>
					<th>Edit time</th>
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

		<a href="index.php">Back</a>
	</body>
</html>