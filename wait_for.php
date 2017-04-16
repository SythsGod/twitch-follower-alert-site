<?php
	require_once 'lib_twitch.php';

	$api_obj = new Retriever();
	$parsed = $api_obj->GetFollowersWithLimit('38753857', 3);

	$followers_array = array();

	// compare latest follower
	$file_stored_recent_followers_fetch = 'recent_followers.txt';
	$file_handle_fetch = fopen($file_stored_recent_followers_fetch, 'r') or die("Can't open file.");
	$json_obj = json_decode(fread($file_handle_fetch, filesize($file_stored_recent_followers_fetch)));

	$last_follower_fetched = $json_obj->{'follower_0'}; // saved offline
	$last_follower_requested = $parsed['follows'][0]['user']['display_name']; // just requested online
	//$last_follower_requested = 'debug_test'; // debug

	$new_follower_alert = $last_follower_fetched != $last_follower_requested;

	// debug
	// echo $new_follower_alert ? 'true' : 'false';
	// echo '</br>';

	if($new_follower_alert){
		// load page for new follower
		header('Location:follower_alert.php?follower=' . $last_follower_requested);
	}

	fclose($file_handle_fetch);

	// store 5 latest followers in json text file
	$file_stored_recent_followers = 'recent_followers.txt';
	$file_handle = fopen($file_stored_recent_followers, 'w') or die("Can't open file.");
	$array_data = array();

	foreach($parsed['follows'] as $key => $value){
		// echo 'Follower'.$key.':'.$value['user']['display_name'];
		// echo '</br>';
		$array_data['follower_' . $key] = $value['user']['display_name'];
	}

	$json_encode = json_encode($array_data);
	fwrite($file_handle, $json_encode);
	fclose($file_handle);

	// Debug
	// echo 'Follower0:YourBiggestFan</br>Follower1:Lordmau5</br>Follower2:AndrejSavikin</br>Follower3:Tranquil002218</br>Follower4:ShadowfactsDev;
?>

	<script type='text/javascript'>
		// refresh page every 10s
		setTimeout(function(){
			location = ''}, 10000);
	</script>