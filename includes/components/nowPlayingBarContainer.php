<?php
$songQuery = mysqli_query($con, "SELECT id FROM songs ORDER BY  RAND() LIMIT 10");
$resultArray = array();
while ($row = mysqli_fetch_array($songQuery)) {
    array_push($resultArray, $row['id']);
}

$jsonArray = json_encode($resultArray);
?>

<script>
    $(document).ready(function () {
        currentPlaylist = <?php echo $jsonArray ?>;
        audioElement = new Audio();
        setTrack(currentPlaylist[0], currentPlaylist, false)
    });

    function setTrack(trackId, newPlaylist, play) {
        $.post("", { songId: trackId }, function (data) {

        });

        if (play) {
            audioElement.play();
        }
    }

    function playSong() {
        $(".controlButton.play").hide();
        $(".controlButton.pause").show();
        audioElement.play();
    }

    function pauseSong() {
        $(".controlButton.play").show();
        $(".controlButton.pause").hide();
        audioElement.pause();
    }

</script>

<div id="nowPlayingBar">
    <div id="nowPlayingLeft">
        <div class="content">
                <span class="albumLink">
                    <img src="assets/img/album.jpg" alt="Cover">
                </span>
            <div class="trackInfo">
                    <span class="trackName">
                        <span>Braindead Lunatic</span>
                    </span>
                <span class="artistName">
                        <span>Nosferatu, Spitnoise</span>
                    </span>
            </div>
        </div>
    </div>
    <div id="nowPlayingCenter">
        <div class="content playerControls">
            <div class="buttons">
                <button class="controlButton shuffle" title="Shuffle button">
                    <img src="assets/img/icons/shuffle.png" alt="shuffle">
                </button>
                <button class="controlButton back" title="Back button">
                    <img src="assets/img/icons/back.png" alt="back">
                </button>
                <button class="controlButton play" title="Play button" onclick="playSong()">
                    <img style="height: 40px; width: 40px;" src="assets/img/icons/playing.png" alt="Play button">
                </button>
                <button style="display: none" class="controlButton pause"
                        title="Pause button" onclick="pauseSong()">
                    <img style="height: 40px; width: 40px;" src="assets/img/icons/pauze.png" alt="Pause button">
                </button>
                <button class="controlButton next" title="Next button">
                    <img src="assets/img/icons/next.png" alt="next">
                </button>
                <button class="controlButton repeat" title="Repeat button">
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
        <div class="volumeBar">

            <button class="controlButton volume" title="Volume button">
                <img src="assets/img/icons/sound.png" alt="Volume">
            </button>

            <div class="progressBar">
                <div class="progressBarBg">
                    <div class="progress"></div>
                </div>
            </div>

        </div>
    </div>
</div>