<!DOCTYPE html>
<html>
<head>
	<title>Follower List</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href='http://fonts.googleapis.com/css?family=Josefin+Sans&subset=latin,latin-ext' rel='stylesheet' type='text/css'>

	<?php
		require_once '../lib_twitch.php';

		$user = isset($_GET['user']) ? $_GET['user'] : 'SythsGod';
		$limit = isset($_GET['limit']) ? $_GET['limit'] : '100';

		$isMe = $user == 'SythsGod';

		$class_obj = new Retriever();
		$list = $class_obj->GetFollowersWithLimit($user, $limit);
		$follower_count = $list['_total'];
	?>
</head>
<body>
	<?php
		if($isMe){
			echo '<div class="thanks-block-pre-wrapper"><div class="thanks-block-pre">To all my followers</div></div>';
			echo '<div class="thanks-block-back">';
			echo '<div class="thanks-block">A massive thanks!</div>';
			echo '</div>';
		}

		echo '<div class="follower-count-block-container">';
			echo '<div class="follower-count-block-wrapper">';
				echo '<div class="follower-count-title-block">follower count</div>';
				echo '<div class="follower-count-block">' . $follower_count . '</div>';
			echo '</div>';
		echo '</div>';
	?>

	<div class='container'>
		<?php
			echo '<div class="follower-block">';
				echo '<div class="follower-block-id">ID</div>';
				echo '<div class="follower-block-user">USERNAME</a></div>';
				echo '<div class="follower-block-date">DATE</div>';
			echo '</div>';

			foreach($list['follows'] as $key => $value){
				$ccc = $follower_count - $key;
				echo '<div class="follower-block">';
					echo '<div class="follower-block-id">' . $ccc . '</div>';
					echo '<div class="follower-block-user"><a href="http://www.twitch.tv/' . $value['user']['display_name'] . '" target="blank_">' . $value['user']['display_name'] . '</a></div>';
					echo '<div class="follower-block-date">' . substr($value['created_at'], 0, 10) . '</div>';
				echo '</div>';
			}
		?>
	</div>
</body>
</html>

<style>
	@font-face { font-family: Sansation; src: url(../attributes/fonts/sansation/Sansation_Regular.ttf); }
	@font-face { font-family: Digital; src: url(../attributes/fonts/digital/DLE_Digital.ttf); }
	@font-face { font-family: Party Hard; src: url(../attributes/fonts/party_hard/party_hard.ttf); }

	body, html { margin: 0; padding: 0; min-width: 785px; background: #f1f3f1; }

	.container {
		width: 80%;

		margin: 0 auto 0 auto;
	}

	.thanks-block-pre-wrapper {
		width: 100%;
		height: 100px;

		text-align: center;
	}

	.thanks-block-pre {
		display: inline-block;

		width: 500px;
		height: 50px;

		font-family: Sansation;
		font-size: 36px;
		font-weight: bolder;

		text-transform: uppercase;
		line-height: 50px;

		margin-top: 25px;

		border: 1px solid #8c8c8c;

		color: #8c8c8c;
	}

	.thanks-block-back {
		width: 100%;
		height: 160px;

		background: #8c8c8c;
	}

	.thanks-block {
		display: inline-block;

		width: 100%;
		height: 96px;

		margin-top: 32px;

		font-family: Digital;
		font-size: 300%;

		border-top: 2px solid #f1f3f1;
		border-bottom: 2px solid #f1f3f1;

		line-height: 96px;
		text-align: center;
		text-transform: uppercase;

		color: orange;
		background: #b2b2b2;
	}

	.follower-count-block-container {
		width: 100%;

		margin-top: 25px;

		text-align: center;

		border-bottom: 1px solid gray;
	}

	.follower-count-block-wrapper {
		display: inline-block;

		width: auto;
		height: auto;

		padding: 0 20px 25px 20px;
	}

	.follower-count-title-block {
		width: 100%;
		height: 50px;

		margin-bottom: 25px;

		text-align: center;
		text-transform: uppercase;
		line-height: 50px;

		font-family: Sansation;
		font-size: 200%;

		color: #8c8c8c;
	}

	.follower-count-block{
		font-family: Party Hard;
		font-size: 750%;

		text-align: center;

		color: orange;
	}

	a {
		text-decoration: none;
		color: black;
	}

	a:visited {
		color: black;
	}

	.follower-block {
		border-bottom: 1px solid gray;

		font-family: Josefin Sans;
	}

	.follower-block-id, .follower-block-user, .follower-block-date {
		display: inline-block;

		width: calc(100% / 3);
		height: 50px;

		line-height: 50px;
	}

	.follower-block-user {
		text-align: center;
	}

	.follower-block-date {
		text-align: right;
	}

	.container > div:last-child{
		border: none !important;
	}

	.container > div:first-child{
		border-bottom: 2px solid gray !important;
		background: none !important;
	}

	.container > .follower-block:nth-child(odd){
		background: #b8d5df;
	}
</style>