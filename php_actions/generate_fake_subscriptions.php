<?php
	require_once '../vendor/autoload.php';
	$faker = Faker\Factory::create();

    include 'connect_db.php';

	$sql = "INSERT INTO subscriptions_dummy_table (subscription_id, username) VALUES ";

	for ($x = 0; $x < 100; $x++) {
		$subscription_id = rand(1000, 100000);
		$username = $faker->userName;

		$sql .= " (\"$subscription_id\", \"$username\")";

		if ($x != 99) 
			$sql .= ",";
		
	}

	echo $sql;

	$conn->exec($sql);
	$conn = null;