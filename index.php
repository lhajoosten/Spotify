<?php
include("includes/config.php");

// session_destroy();

if (isset($_SESSION['userLoggedIn'])) {
    $userLoggedIn = $_SESSION['userLoggedIn'];
} else {
    header("Location: register.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Spotify</title>
    <link rel="icon" href="assets/img/icons/Spotify_Icon_RGB_Green.png">
    <link rel="stylesheet" type="text/css" href="assets/css/index.css">
</head>
<body>

<div id="mainContainer">
    <div id="topContainer">
        <div id="navbarContainer">
            <?php include("includes/navBarContainer.php"); ?>
        </div>
    </div>

    <div id="nowPlayingBarContainer">
        <?php include("includes/nowPlayingBarContainer.php"); ?>
    </div>
</div>
</body>
</html>
