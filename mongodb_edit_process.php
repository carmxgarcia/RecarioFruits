<?php
	$dbhost = 'localhost';
	$dbname = 'test';
	
	date_default_timezone_set('Asia/Manila');
	
	$db1 = new MongoClient('mongodb://localhost', array());
	$connection1 = $db1->selectCollection("test", "recariofruits");
	
	$name = $_POST['edit_name'];
	$price = $_POST['edit_price'];
	$quantity = $_POST['edit_quantity'];
	$distributor = $_POST['edit_distributor'];
	$date = date('Y-m-d H:i:s');
	
	$file_name = $_FILES["the_file"]["name"]; 
	$file_temp_loc = $_FILES["the_file"]["tmp_name"];
	$path_name = "images/".$file_name;
	move_uploaded_file($file_temp_loc, $path_name);
	
	$filter=array('_id' => new MongoID($_POST['edit_id']));
	$update=array('$set' => array('fruit_name' => $name,
							'fruit_price' => $price, 	
							'fruit_quantity' => $quantity, 
							'fruit_distributor' => $distributor, 
							'fruit_datelog' => $date,
							'fruit_img' => $file_name));
	$connection1->update($filter,$update);	
	
	$connection2 = $db1->selectCollection("test", "recariofruits_pricelog");
	$data2 = array( "fruit_id" => new MongoID($_POST['edit_id']), 
						"fruit_name" => $name,
						"fruit_logdatetime" => date('Y-m-d H:i:s'), 
						"fruit_price" => $price);
	$connection2->insert($data2);
	
	header("location: ../recariofruits-master/#mongodb");
?>