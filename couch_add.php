<?php
	require_once "/lib/couch_connect.php";
	
	date_default_timezone_set('Asia/Manila');
	
	$fruit_doc = new stdClass();
	$fruit_doc->name = $_POST['name'];
	$fruit_doc->price = $_POST['price'];
	$fruit_doc->qty = $_POST['qty'];
	$fruit_doc->datelog = date('Y-m-d H:i:s');
	$fruit_doc->distributor = $_POST['distributor'];
	
	$file_name = htmlspecialchars($_FILES['the_file']['name']);
	move_uploaded_file($_FILES['the_file']['tmp_name'],"images/".$file_name);
	$fruit_doc->img = $file_name;
	
	try {
		$response = $fruit_client->storeDoc($fruit_doc);
	} catch (Exception $e) {
		echo "Something weird happened: ".$e->getMessage()." (errcode=".$e->getCode().")\n";
		exit(1);
	}
	
	$pricelog_doc = new stdClass();
	$pricelog_doc->fruit_id = $response->id;
	$pricelog_doc->fname = $_POST['name'];
	$pricelog_doc->logdatetime = date('Y-m-d H:i:s');;
	$pricelog_doc->fprice = $_POST['price'];
	
	
	try {
		$response = $price_client->storeDoc($pricelog_doc);
	} catch (Exception $e) {
		echo "Something weird happened: ".$e->getMessage()." (errcode=".$e->getCode().")\n";
		exit(1);
	}
	
	

	header("location: ../recariofruits/#couchdb");
?>