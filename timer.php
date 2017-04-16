<!DOCTYPE html>
<html>
<head>
	<title>Timer</title>

	<script src="//code.jquery.com/jquery-1.10.2.js"></script>

	<?php
		$start_time = isset($_GET['st']) ? $_GET['st'] : 0;
	?>

	<script>
		function get_elapsed_time_string(total_seconds) {
				function pretty_time_string(num) {
					return ( num < 10 ? "0" : "" ) + num;
				}

				var hours = Math.floor(total_seconds / 3600);
				total_seconds = total_seconds % 3600;

				var minutes = Math.floor(total_seconds / 60);
				total_seconds = total_seconds % 60;

				var seconds = Math.floor(total_seconds);

				// Pad the minutes and seconds with leading zeros, if required
				hours = pretty_time_string(hours);
				minutes = pretty_time_string(minutes);
				seconds = pretty_time_string(seconds);

				// Compose the string for display
				var currentTimeString = hours + ":" + minutes + ":" + seconds;

				return currentTimeString;
			}

		var start_time = '<?php echo $start_time; ?>';
		var elapsed_seconds = parseInt(start_time);
		setInterval(function() {
			elapsed_seconds = elapsed_seconds + 1;
			$('.timer-block').text(get_elapsed_time_string(elapsed_seconds));
		}, 1000);

		var isShowing = true;
		var waitTime = 600000;

		$('document').ready(function(){
			setTimeoutTimer(waitTime);
		});

		function setDisplay(){
			isShowing = !isShowing;

			var status = isShowing ? 'none' : 'inline';			

			$('.timer-block').css('display', status);
		};

		function setTimeoutTimer(interval){
			setTimeout(function() {
				waitTime = isShowing ? 300000 : 900000;
				setDisplay();
				setTimeoutTimer_2(waitTime);
			}, interval);
		};

		function setTimeoutTimer_2(interval){
			setTimeout(function() {
				waitTime = isShowing ? 300000 : 900000;
				setDisplay();
				setTimeoutTimer(waitTime);
			}, interval);
		}
	</script>
</head>
<body>
	<div class='container'>
		<div class='timer-block'></div>
	</div>
</body>
</html>

<style>
	@font-face { font-family: American Captain; src: url(../attributes/fonts/american_captain/American_Captain.ttf) format('truetype'); }

	body, html { margin: 0; padding: 0 ; }

	.timer-block {
		width: 150px;
		font-family: American Captain;
		font-size: 48px;
		color: #ff6c02;
	}
</style>