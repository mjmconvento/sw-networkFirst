<?php
	require_once '../vendor/autoload.php';
	$faker = Faker\Factory::create();


    include 'connect_db.php';

	$sql = "INSERT INTO notifications_dummy_table (subscription_id, title, body, url) VALUES ";

	for ($x = 0; $x < 100; $x++) {
		$subscription_id = rand(1000, 100000);
		$title = $faker->catchPhrase;
		$body = $faker->realText($maxNbChars = 200, $indexSize = 2);
		$url = $faker->url;

		$title = str_replace('"', ' ', $title);
		$body = str_replace('"', ' ', $body);
		$url = str_replace('"', ' ', $url);

		$sql .= " (\"$subscription_id\", \"$title\", \"$body\", \"$url\")";

		if ($x != 99) 
			$sql .= ",";
		
	}

	echo $sql;

	$conn->exec($sql);
	$conn = null;