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
            <div class="content playerControls">
                <div class="buttons">
                    <button class="controlButton" title="Shuffle button">
                        <img src="assets/img/icons/shuffle.png" alt="shuffle"></button>
                    <button class="controlButton" title="Back button">
                        <img src="assets/img/icons/back.png" alt="back">
                    </button>
                    <button class="controlButton" title="Play button">
                        <img style="height: 32px; width: 32px;" src="assets/img/icons/play.png" alt="play">
                    </button>
                    <button style="height: 32px; width: 32px; display: none" class="controlButton" title="Pause button">
                        <img src="assets/img/icons/play.png" alt="play"></button>
                    <button class="controlButton" title="Next button">
                        <img src="assets/img/icons/next.png" alt="next">
                    </button>
                    <button class="controlButton" title="Repeat button">
                        <img src="assets/img/icons/repeat.png" alt="repeat">
                    </button>

                </div>
                <div class="playbackBar">
                    <span class="progressTime current">0.00</span>
                    <div class="progressBar">
                        <div class="progressBarBg">
                            <div class="progress"></div>
                        </div>
                    </div>
                    <span class="progressTime remaining">0.00</span>
                </div>
            </div>
        </div>
        <div id="nowPlayingRight">

        </div>
    </div>
</div>


</body>
</html>
