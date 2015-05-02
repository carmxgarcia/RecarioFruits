<?php
	if(isset($_GET['fruit_id'])){	
		
		require_once "/lib/couch_connect.php";
	
		try {
				$fruit_doc = $fruit_client->getDoc($_GET['fruit_id']);
			} catch (Exception $e) {
				if ( $e->code() == 404 ) {
					echo "Document \"some_doc\" not found\n";
				} else {
					echo "Something weird happened: ".$e->getMessage()." (errcode=".$e->getCode().")\n";
				}
				exit(1);
			}
		
		try {
			$price_doc = $price_client->useDatabase('log');
			$price_doc = $price_client->getAllDocs();
		} catch (Exception $e) {
			if ( $e->code() == 404 ) {
			echo "Document \"some_doc\" not found\n";
		} else {
			echo "Something weird happened: ".$e->getMessage()." (errcode=".$e->getCode().")\n";
		}
			exit(1);
		}	
		//print_r($doc);
		$price_doc = (array)$price_doc;
		echo "Fruit: ".$fruit_doc->name;
		echo '
			<table border="1">
				<tr>
					<td>Date</td>
					<td>Price</td>
				</tr>
		';
		
		for($i=0; $i<$price_doc['total_rows']; $i++){
			$data = (array)$price_doc['rows'][$i];
			$mydata = (array)$price_client->getDoc($data['id']);
			$fprice = $mydata['fprice'];
			$date = $mydata['logdatetime'];
			$fid = $mydata['fruit_id'];
			
			if($fid == $_GET['fruit_id']){
				echo '<tr>
						<td>'.$date.'</td>
						<td>'.$fprice.'</td>
					<tr>';
			}
		}
		echo '</table>';
	}
	echo '<a href="../recariofruits/#couchdb"> Back </a>';
?>