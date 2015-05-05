<?php
	// $start = microtime(true);
	
	$dbhost = 'localhost';
	$dbname = 'test';
	 
	$db1 = new MongoClient('mongodb://localhost', array());
	$connection1 = $db1->selectCollection("test", "recariofruits");
	$connection1->remove(array( "_id" => new MongoID($_GET['delete_id'])));
	
	$connection2 = $db1->selectCollection("test", "recariofruits_pricelog");
	$connection2->remove(array( "fruit_id" => new MongoID($_GET['delete_id'])));
	
	// $time_elapsed_secs = microtime(true) - $start;
	// echo $time_elapsed_secs;
	
	// header("location: ../recariofruits-master/#mongodb");
?>