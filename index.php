<?php include("includes/components/header.php"); ?>

<h1 class="pageHeadingBig">You Might Also Like</h1>

<div class="gridViewContainer">
    <?php
    $albumQuery = mysqli_query($con, "SELECT * FROM Albums");
        while ($row = mysqli_fetch_array($albumQuery)) {
            echo $row['title'] . "<br>";
        }
    ?>
</div>

<?php include("includes/components/footer.php"); ?>



