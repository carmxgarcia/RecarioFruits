<?php
	$db1 = new MongoClient('mongodb://localhost', array());
	$connection1 = $db1->selectCollection("test", "recariofruits");
	$cursor = $connection1->find( array('_id' => new MongoID($_GET['fruit_id'])));
	
	foreach($cursor as $doc) {
		$name = $doc['fruit_name'];
		$id = $doc['_id'];
	}
	
	echo "Fruit: ".$name."<br/><br/>";
	echo '
		<table border="1">
			<tr>
				<td>Date</td>
				<td>Price</td>
			</tr>
			';
			
	$connection2 = $db1->selectCollection("test", "recariofruits_pricelog");
	$cursor = $connection2->find( array('fruit_id' => new MongoID($id)));
	
	foreach ($cursor as $doc) {
		$date = $doc['fruit_logdatetime'];
		$price = $doc['fruit_price'];
		
		echo '<tr>
				<td>'.$date.'</td>
				<td>'.$price.'</td>
			 <tr>
		';
	}
	
	echo '</table>';
	echo '<br/><br/><a href="../recariofruits-master/#mongodb"> Back </a>';
?>