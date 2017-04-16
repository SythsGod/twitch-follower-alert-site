<!DOCTYPE html>
<html>
<head>
	<title>Recent Followers</title>

	<script src="//code.jquery.com/jquery-1.10.2.js"></script>

	<?php
		$new_follower = isset($_GET['follower']) ? $_GET['follower'] : 'Test_User';
		$colors = array('ee4035', 'f37736', '7bc043', '0392cf');
		$bg_colors = array('ffb2b2', 'ffdb99', 'd4fd98', '7fbfff');
		$file_stored_random_number = 'random_number.txt';

		// read last random number
		$file_handle = fopen($file_stored_random_number, 'r');
		$last_random_number = fread($file_handle, filesize($file_stored_random_number));
		fclose($file_handle);

		do {
			$random = rand(0, 3);
		} while ($random == $last_random_number);

		$chosen_color = $colors[$random];
		$chosen_bg_color = $bg_colors[$random];

		//write random number away
		$file_handle = fopen($file_stored_random_number, 'w');
		$data_string = strval($random);
		fwrite($file_handle, $data_string);
		fclose($file_handle);
	?>
</head>
<body>
	<div id='user' class='user-block'>Welcome <?php echo $new_follower ?>!</div>

	<script>
		$(document).ready(function(){
			$('#user').addClass('move-down');

			var delay = 10000;
			//setTimeout(function(){ window.location.href = 'wait_for.php';}, delay);
		});
	</script>
</body>
</html>

<style>
	@font-face { font-family: 'Cocogoose'; src: url(/fonts/cocogoose/Cocogoose_trial.otf); }
	@font-face { font-family: 'Leixo'; src: url(../fonts/leixo/LEIXO-DEMO.ttf); }
	@font-face { font-family: 'Inversionz'; src: url(../fonts/inversionz/InversionzUnboxed.otf); }

	body, html { margin: 0; padding: 0; }

	.user-block {
		width: 1200px;

		text-align: center;
		color: <?php echo '#' . $chosen_color ?>;

		font-family: 'Inversionz';
		font-size: 72px;
		text-shadow: 2px 2px 1px #666;

		border: 2px solid <?php echo '#' . $chosen_color ?>;

		margin: 50px 0 0 50px;
		padding: 5px;

		/*margin-top: -150px !important;*/

		background: <?php echo '#' . $chosen_bg_color ?>;
	}

	.move-down {
		margin-top: 50px !important;
		transition: margin 2s;
		transition-timing-function: ease-out;
	}
</style>