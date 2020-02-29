<?php
include("includes/components/header.php");

if (isset($_GET['id'])) {
    $albumId = $_GET['id'];
} else {
    header("Location: index.php");
}

$album = new Album($con, $albumId);
$artist = $album->getArtist();
?>

<div class="entityInfo">
    <div class="leftSection">
        <img src="<?php echo $album->getCover(); ?>" alt="Cover">
    </div>
    <div class="rightSection">
        <p>Album</p>
        <h2><?php echo $album->getTitle(); ?></h2>
        <span>By <strong><?php echo $artist->getName(); ?></strong></span>
        <p><?php echo $album->getSongAmount(); ?> songs</p>

        <!-- TODO: Show correct total duration -->
        <p>Total duration:
            <?php
            $total = $album->totalDuration();
            if ($total >= 60) echo ($total % 60) . " Hrs and " . ($total % 60) . " Min";
            else echo "0 Hrs and " . round($total) . " Min"
            ?></p>

    </div>
</div>

<div class="trackListContainer">
    <ul class="trackList">

        <?php
        $songIdArray = $album->getSongId();
        $i = 1;
        foreach ($songIdArray as $songId) {

            $albumSong = new Song($con, $songId);
            $albumArtist = $albumSong->getArtist();

            echo "
            <li class='trackListRow'>
                <div class='trackCount'>
                    <img class='play' src='assets/img/icons/play-white.png' alt='Play'>
                    <span class='trackNumber'>$i</span>
                </div>
                <div class='trackInfo'>
                    <span class='trackName'> " . $albumSong->getTitle() . " </span>
                    <span class='artistName'>" . $artist->getName() . "</span>
                </div>
                <div class='trackOptions'>
                    <img class='optionsButton' src='assets/img/icons/more.png' alt='More'>
                </div>
                <div class='trackDuration'>
                    <span class='duration'>". $albumSong->getDuration() ."</span>
                </div>
            </li>";
            $i++;
        }
        ?>

    </ul>
</div>


<?php include("includes/components/footer.php"); ?>



