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
    <title>Welcome to Spotify</title>
    <link rel="icon" href="assets/img/icons/Spotify_Icon_RGB_Green.png">
    <link rel="stylesheet" type="text/css" href="assets/css/index.css">
</head>
<body>

<div id="nowPlayingBarContainer">
    <div id="nowPlayingBar">
        <div id="nowPlayingLeft">

        </div>
        <div id="nowPlayingCenter">

        </div>
        <div id="nowPlayingRight">

        </div>
    </div>
</div>


</body>
</html>
