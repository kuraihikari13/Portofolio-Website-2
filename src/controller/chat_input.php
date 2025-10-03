<?php

	$chat = $_POST['chat'];
	$user = $_POST['user'];

	$chatlog = array();
	$chatlog['user'] = $user;
	$chatlog['chat'] = $chat;

	$file = file_get_contents('chatlog.json');

	$decoded_json = json_decode($file, true);

	$decoded_json[] = $chatlog;

	file_put_contents("chatlog.json", json_encode($decoded_json));

?>