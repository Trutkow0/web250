<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Names.php</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			text-align: center;
			background-color: #f4f4f4;
		}

		h1 {
			color: #333
		}

		ol {
			display: inline-block;
			text-align: left;
			background: white;
			padding: 5px 50px;
			border-radius: 10px;
			box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
		}

		li {
			padding: 5px;
		}
	</style>
</head>

<body>
	<h1>My Name Repeated 100 Times</h1>
	<ol>
		<?php 
		for ($i = 1; $i <= 100; $i++) {
			echo "<li>Timothy Rutkowski</li>";
		}
		?>
	</ol>
</body>
