<?php
	$couch_dsn = "http://localhost:5984/";
	$fruit_db = "fruit";
	$price_db = "log";
						
	require_once "/couch.php";
	require_once "/couchClient.php";
	require_once "/couchDocument.php";

	$fruit_client = new couchClient($couch_dsn,$fruit_db);
	$price_client = new couchClient($couch_dsn,$price_db);
?>