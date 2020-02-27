<?php
include("includes/components/header.php");


if (isset($_GET['id'])) {
    $albumId = $_GET['id'];
} else {
    header("Location: index.php");
}

$album = new Album($con, $albumId);

echo "<img src='" . $album->getCover() . "' alt='Cover'" . "<br>";
echo "single" . "<br>";
echo $album->getTitle() . "<br>";
echo "By " . "<strong>" . $album->getArtist()->getName() . "</strong>" . "<br>";


?>


<?php include("includes/components/footer.php"); ?>



