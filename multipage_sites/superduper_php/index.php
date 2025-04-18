<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
	<title>super duper paratrooper page</title>
	<link rel = "stylesheet" type = "text/css" href = "styles.css" />
</head>
<body>
<header>


	<a href = "index.php"  >
		<img class = "linkedimage" src = "images/sdp_banner.png" alt = "Super Duper Paratrooper" />
	</a>
	<br />
	
	<a href = "?p=home.php">home</a> | 
	<a href = "?p=alpha.php">alpha</a> | 
	<a href = "?p=bravo.php">bravo</a> | 
	<a href = "?p=charlie.php">charlie</a> | 
	<a href = "?p=delta.php">delta</a> | 
	<a href = "?p=echo.php">echo</a>



</header>
<hr />
<!-- dynamic content goes here -->

<?php
	$sPage = $_GET["p"];
	//echo ("You picked the page: " . $sPage); 
	
	if($sPage == "") {  $sPage = "home.php"; }
	include($sPage);
?>


<hr />

<footer id = "tagline">
      		We bring it... from above!
	<br/><br/>
	<a href="http://validator.w3.org/check?uri=referer">
		<img src="images/valid_html5.gif"  alt="Valid HTML 5" 
			height="31" width="88" style="border:0px;" />

	</a>
</footer>

</body>
</html>