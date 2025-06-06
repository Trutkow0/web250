<?php
$showIntroOutput = ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['personal']));
?>

<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
        <meta charset="utf-8">
        <title>Timothy Rutkowski's Tenacious Raccoon | WEB250 | Home</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="keywords" content="UPDATE FOR PAGE">
        <meta name="description" content="UPDATE FOR PAGE">
        <meta name="author" content="Timothy Rutkowski">
        <link rel="icon" href="images/TR_fav250.png">
        <link rel="stylesheet" href="styles/styles.css">
        <!-- FONT BEGIN -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Economica:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
        <!-- FONT END -->
        <script src="https://lint.page/kit/880bd5.js" crossorigin="anonymous"></script>
</head>


<body>
        <?php include("components/header.php"); ?>  
        <div class="container">
                <?php include("components/sidebar.php"); ?>
                        <main>
                                <?php include("components/home.php"); ?>  
                                <?php include("components/introduction.php"); ?>     
                                <?php include("components/contract.php"); ?>
				<?php include("components/fizzbuzz.php"); ?>
				<?php include("components/introduction-form.php"); ?>
				<?php include("components/introduction-output.php"); ?>
                        </main>
        </div>
        <?php include("components/footer.php"); ?>
<script src="scripts/introduction.js" defer></script>
</body>
</html>
