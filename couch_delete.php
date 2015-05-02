<?php
	require_once "/lib/couch_connect.php";
	
	if(isset($_GET['delete_id'])){
		$id = $_GET['delete_id'];
		
		// retrieve doc to be deleted
		try {
			$doc = $fruit_client->getDoc($id);
		} catch (Exception $e) {
			if ( $e->code() == 404 ) {
				echo "Document \"some_doc\" not found\n";
			} else {
				echo "Something weird happened: ".$e->getMessage()." (errcode=".$e->getCode().")\n";
			}
			exit(1);
		}
		//echo "Document retrieved: ".print_r($doc,true)."\n";
		
		//delete retrieved doc
		try {
			$result = $fruit_client->deleteDoc($doc);
		} catch (Exception $e) {
			echo "Something weird happened: ".$e->getMessage()." (errcode=".$e->getCode().")\n";
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
		
		for($i=0; $i<$price_doc['total_rows']; $i++){
			$data = (array)$price_doc['rows'][$i];
			$mydata = (array)$price_client->getDoc($data['id']);
			$fid = $mydata['fruit_id'];
			$pid = $mydata['_id'];
			
			if($fid == $_GET['delete_id']){
				try {
					$doc = $price_client->getDoc($pid);
				} catch (Exception $e) {
					if ( $e->code() == 404 ) {
						echo "Document \"some_doc\" not found\n";
					} else {
						echo "Something weird happened: ".$e->getMessage()." (errcode=".$e->getCode().")\n";
					}
					exit(1);
				}
				
				try {
					$result = $price_client->deleteDoc($doc);
				} catch (Exception $e) {
					echo "Something weird happened: ".$e->getMessage()." (errcode=".$e->getCode().")\n";
					exit(1);
				}
			}
		}
	}
	
	header("location: ../recariofruits/#couchdb");

?>