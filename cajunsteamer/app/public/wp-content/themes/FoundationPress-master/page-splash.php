<?php
/*
Template Name: Splash
*/
?>

<html>
<head>
	<title>Cajun Steamer</title>

	<script type="text/javascript" src="//use.typekit.net/ubd6snn.js"></script>
	<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
  <link href='http://fonts.googleapis.com/css?family=Sue+Ellen+Francisco' rel='stylesheet' type='text/css'>

	<style>
		h1 {
			font-family: 'Sue Ellen Francisco', cursive !important;
			text-transform: uppercase;
			text-align: center;
			font-size: 40px;
			color: #a5001e;
		}
		html, body {
			width: 100% !important;
			height: 100% !important;
			background: url('<?php echo get_template_directory_uri(); ?>/img/mobile-header-bg.jpg');
		}
		.splash {
			width: 100%;
			height: 100%;
		}
		.outer {
			position: relative;
			width: 100%;
			height: 100%;
			display: table;
		}

		.outer .inner {
			display: table-cell;
			vertical-align: middle;
			text-align: center;
		}
		img {
			max-width: 75%;
			width: 800px;
			border: 10px solid #a5001e;
		}
	</style>
</head>
<body>
	<div class="splash">
		<div class="outer">
			<div class="inner">
			<img src="<?php echo get_template_directory_uri(); ?>/img/logo.jpg" alt="">
				<h1>New Website<br />Coming Soon!</h1>
			</div>
		</div>
	</div>
</body>
</html>