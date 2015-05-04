<?php
	$dbhost = 'localhost';
	$dbname = 'test';
	
	date_default_timezone_set('Asia/Manila');
	 
	$db1 = new MongoClient('mongodb://localhost', array());
	$connection1 = $db1->selectCollection("test", "recariofruits");
	
	$file_name = $_FILES["the_file"]["name"]; 
	$file_temp_loc = $_FILES["the_file"]["tmp_name"];
	$path_name = "images/".$file_name;
	move_uploaded_file($file_temp_loc, $path_name);
	
	$data1 = array( "fruit_name" => $_POST['name'], 
						"fruit_price" => $_POST['price'],
						"fruit_quantity" => $_POST['quantity'], 
						"fruit_distributor" => $_POST['distributor'],
						"fruit_datelog" => date('Y-m-d H:i:s'),
						"fruit_img" => $file_name);
	
	$connection1->insert($data1);
	
	$newDataID = $data1['_id'];
	
	$connection2 = $db1->selectCollection("test", "recariofruits_pricelog");
	$data2 = array( "fruit_id" => $newDataID, 
						"fruit_name" => $_POST['name'],
						"fruit_logdatetime" => date('Y-m-d H:i:s'), 
						"fruit_price" => $_POST['price']);
	$connection2->insert($data2);

	header("location: ../recariofruits-master/#mongodb");
?>