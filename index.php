<!DOCTYPE html>
<html>
<head>
	<title>Twitch</title>

	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<script>
		$('document').ready(function() {
			var window_height = $(window).height();
			var title_block_top_offset = window_height / 2 - 100;

			$('.title-block').css('margin-top', title_block_top_offset + 'px');
			$('.title-block').css('height', window_height - title_block_top_offset + 'px');

			$('.information-block').css('height', window_height + 'px');

			$('.desc').css('padding-top', window_height / 2 - 100 + 'px');

			$('.title').click(function(){
				window.scrollTo(0, window_height);;
			});

			$(window).resize(function(){ location.reload(); });
		});
	</script>
</head>
<body>
	<div class='container'>
		<div class='title-block'><p class='title shadow'>Muchos Welcome!</p></div>
		<div class='information-block'><p class='desc'>YOU CAN FIND ME</p><div class='button-block'><a class='button' href='http://www.twitch.tv/SythsGod'>HERE!</a></div></div>
	</div>
</body>
</html>

<style>
	@font-face { font-family: Dimitri Swank; src: url(../attributes/fonts/dimitri_swank/dimitri_swank.ttf) format('truetype'); }

	html, body { margin: 0; padding: 0; min-width: 700px; }

	.title-block {
		width: 100%;

		text-align: center;
	}

	.title-block:hover {
		cursor: pointer;
	}

	p { padding: 0; margin: 0; }

	.title {
		display: block;

		width: 100%;
		height: 150px;

		line-height: 150px;

		font-family: Dimitri Swank;
		font-size: 500%;

		background: #6441A5;
	}

	.information-block {
		display: block;

		width: 100%;

		background: #6441A5;
	}

	.desc {
		display: block;

		width: 100%;
		height: 100px;

		line-height: 100px;

		text-align: center;

		font-family: Dimitri Swank;
		font-size: 500%;

		color: #1a1a1a;		
	}

	.button-block {
		width: 100%;
	}

	.button {
		display: block;

		width: 250px;
		height: 75px;

		margin: 0 auto 0 auto;

		font-family: Dimitri Swank;
		font-size: 300%;

		text-align: center;
		line-height: 80px;

		border: 1px solid #1a1a1a;
		border-radius: 10px;

		transition: color 0.7s, background 0.7s;
	}

	.button:hover {
		color: #6441A5;
		background: #1a1a1a;

		transition: color 0.7s, background 0.7s;
	}

	a:visited {
		color: #1a1a1a;
	}

	.shadow {
		-webkit-box-shadow: inset 0 -8px 6px -6px #000000, inset 0 8px 6px -6px #000000;
		   -moz-box-shadow: inset 0 -8px 6px -6px #000000, inset 0 8px 6px -6px #000000;
		        box-shadow: inset 0 -8px 6px -6px #000000, inset 0 8px 6px -6px #000000;
	}
</style>