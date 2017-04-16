<?php

	// This is used to get a raw print-off from the last 5 followers, as to be used by Rainmeter and parsed
	// to show on my desktop.


	$user = isset($_GET['u']) ? $_GET['u'] : 'sythsgod';
	$limit = isset($_GET['k']) ? $_GET['k'] : '5';
	$url = 'https://api.twitch.tv/kraken/channels/'.$user.'/follows/?limit='.$limit;
	$user_token = 'tnoe3gkocznc7iz1p16jwj358qsl9y';

	if(function_exists('curl_init')){
		$ch = curl_init();
		$options = array(
			CURLOPT_URL => $url,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_CONNECTTIMEOUT => 5,
			CURLOPT_CUSTOMREQUEST => 'GET',
			CURLOPT_HEADER => 0,
			CURLOPT_SSL_VERIFYPEER => 0,
			CURLOPT_SSL_VERIFYHOST => 0,
			CURLOPT_HTTPHEADER => array('Authorization: OAuth ' . $user_token) //'Accept: application/vnd.twitchtv.v3+json',
			);

		curl_setopt_array($ch, $options);
		$json = curl_exec($ch);
		curl_close($ch);
	}else{
		$json = file_get_contents($url);
	}

	$parsed = json_decode($json, true);
	$parsed = $parsed['follows'];

	foreach($parsed as $key => $value){
		echo 'Follower'.$key.':'.$value['user']['display_name'];
		echo '</br>';

		$array_data['follower_' . $key] = $value['user']['display_name'];
	}

	// Debug
	// echo 'Follower0:YourBiggestFan</br>Follower1:Lordmau5</br>Follower2:AndrejSavikin</br>Follower3:Tranquil002218</br>Follower4:ShadowfactsDev';
?>