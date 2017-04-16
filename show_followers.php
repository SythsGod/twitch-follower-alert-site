<?php
	require_once '../libraries/lib_twitch.php';

	$api_obj = new Retriever();
	$parsed = $api_obj->GetFollowersWithLimit('SythsGod', 3);
	$followers_array = array();

	foreach($parsed['follows'] as $key => $value){
		//array_push($followers_array, 'test_follower_name_debug'); MAX 20 CHARS
		array_push($followers_array, $value['user']['display_name']);
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Show Followers</title>

	<script type='text/javascript'>
		// refresh page every 10s
		setTimeout(function(){
			location = ''}, 10000);
	</script>
</head>
<body>
	<div class='container'>
		<?php
			$i = 0;

			for($i = count($followers_array) - 1; $i >= 0; $i--){
				$curr_string = strtoupper($followers_array[$i]);
				$curr_string = strlen($curr_string) > 20 ? substr($curr_string, 0, 19) : $curr_string;
				echo '<div class="follower">' . $curr_string . '</div>';
			}
		?>
	</div>
</body>
</html>

<style>
	@font-face { font-family: '04b_30'; src: url(../attributes/fonts/04b_30/04B_30__.ttf); }
	@font-face { font-family: 'Taurus Mono Outline Bold'; src: url(../attributes/fonts/taurus_mono/Taurus-Mono-Outline-Bold.otf) format('opentype'); }
	@font-face { font-family: 'Bioliquid'; src: url(../attributes/fonts/bioliquid-Regular.ttf) format('truetype'); }
	html, body { margin: 0; padding: 0; }

	.container {
		width: 400px;
	}

	.follower {
		display: block;

		width: auto;
		height: 35px;

		line-height: 25px;
		text-align: right;

		padding-right: 10px;

		font-family: 'Bioliquid';

		color: #fff;
	}

	.container > div:nth-child(3){
		font-size: 36px;
		font-family: 'Bioliquid';

		color: white;
		background: #ff6c02;
	}

	.container > div:nth-child(2){
		font-size: 32px;
	}

	.container > div:nth-child(1){
		font-size: 28px;
	}
</style>