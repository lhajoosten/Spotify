<?php
include("includes/config.php");
include("includes/classes/Artist.php");
include("includes/classes/Album.php");
include("includes/classes/Song.php");

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
    <link rel="stylesheet" type="text/css" href="assets/css/Index.css">
    <link rel="stylesheet" type="text/css" href="assets/css/albumPage.css">
</head>
<body>

<div id="mainContainer">
    <div id="topContainer">
        <div id="navbarContainer">
            <?php include("includes/components/navBarContainer.php"); ?>
        </div>
        <div id="mainViewContainer">
            <div id="mainContent">