<?php
	require_once "/lib/couch_connect.php";

	if(isset($_POST['edit_id'])){
		$id =  $_POST['edit_id'];
		$name = $_POST['edit_name'];
		$price = $_POST['edit_price'];
		$qty = $_POST['edit_qty'];
		$distributor = $_POST['edit_distributor'];
			
		$file_name = htmlspecialchars($_FILES['the_file']['name']);
		move_uploaded_file($_FILES['the_file']['tmp_name'],"images/".$file_name);
		
		try {
			$fruit_doc = $fruit_client->getDoc($id);
		} catch (Exception $e) {
			if ( $e->code() == 404 ) {
				echo "Document \"some_doc\" not found\n";
			} else {
				echo "Something weird happened: ".$e->getMessage()." (errcode=".$e->getCode().")\n";
			}
			exit(1);
		}
		
		date_default_timezone_set('Asia/Manila');
		$fruit_doc->name = $name;
		$fruit_doc->price = $price;
		$fruit_doc->qty = $qty;
		$fruit_doc->datelog = date('Y-m-d H:i:s');
		$fruit_doc->distributor = $distributor;
		
		if($file_name != null){
			$fruit_doc->img = $file_name;
		}
		
		try {
			$response = $fruit_client->storeDoc($fruit_doc);
		} catch (Exception $e) {
			echo "Something weird happened: ".$e->getMessage()." (errcode=".$e->getCode().")\n";
			exit(1);
		}
	}
	
	$pricelog_doc = new stdClass();
	$pricelog_doc->fruit_id = $response->id;
	$pricelog_doc->fname = $_POST['edit_name'];
	$pricelog_doc->logdatetime = date('Y-m-d H:i:s');;
	$pricelog_doc->fprice = $_POST['edit_price'];
	
	try {
		$response = $price_client->storeDoc($pricelog_doc);
	} catch (Exception $e) {
		echo "Something weird happened: ".$e->getMessage()." (errcode=".$e->getCode().")\n";
		exit(1);
	}
	
	header("location: ../recariofruits/#couchdb");
?>