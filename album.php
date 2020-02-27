<?php include("includes/components/header.php");
    if (isset($_GET['id'])) {
        $albumId = $_GET['id'];
    } else {
        header("Location: index.php");
    }

    $albumQuery = mysqli_query($con, "SELECT * FROM Albums WHERE id='$albumId'");
    $album = mysqli_fetch_array($albumQuery);

    $artistId = $album['artist'];
    $artistQuery = mysqli_query($con, "SELECT * FROM Artists WHERE id='$artistId'");
    $artist = mysqli_fetch_array($artistQuery);

    echo "<img src='" . $album['albumCoverPath'] . "' alt='Cover'" . "<br>";
    echo "single" . "<br>";
    echo $album['title'] . "<br>";
    echo "By " . "<strong>" . $artist['name'] . "</strong>" . "<br>";



?>



<?php include("includes/components/footer.php"); ?>



