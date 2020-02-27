<?php


class Album
{
    private $con;
    private $id;

    public function __construct($con, $id)
    {
        $this->con = $con;
        $this->id = $id;
    }

    public function getTitle() {
        $albumQuery = mysqli_query($this->con, "SELECT title FROM Albums WHERE id='$this->id'");
        return mysqli_fetch_array($albumQuery)['title'];
    }

    public function getCover() {
        $albumQuery = mysqli_query($this->con, "SELECT albumCoverPath FROM Albums WHERE id='$this->id'");
        return mysqli_fetch_array($albumQuery)['albumCoverPath'];
    }

    public function getArtist() {
        $albumQuery = mysqli_query($this->con, "SELECT artist FROM Albums WHERE id='$this->id'");
        return mysqli_fetch_array($albumQuery)['artist'];
    }
}