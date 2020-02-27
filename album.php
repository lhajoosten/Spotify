<?php
include("includes/components/header.php");
include("includes/classes/Artist.php");
include("includes/classes/Album.php");

    if (isset($_GET['id'])) {
        $albumId = $_GET['id'];
    } else {
        header("Location: index.php");
    }
    
    $album = new Album($con, $albumId);
    $artist = new Artist($con, $album->getArtist());

    echo "<img src='" . $album->getCover() . "' alt='Cover'" . "<br>";
    echo "single" . "<br>";
    echo $album->getTitle() . "<br>";
    echo "By " . "<strong>" . $artist->getName() . "</strong>" . "<br>";



?>



<?php include("includes/components/footer.php"); ?>



