<?php
    include 'connect_db.php';

	$stmt = $conn->prepare("SELECT * FROM subscriptions_dummy_table ORDER BY id DESC"); 
	   

    $stmt->execute();
    $stmt = $stmt->fetchAll();

    $conn = null;
    $data = array();

	header('Content-type: application/json');
	echo json_encode($stmt);
