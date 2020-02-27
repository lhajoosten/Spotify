<?php

class Album
{
    private $con;
    private $id;
    private $title;
    private $genre;
    private $artistId;
    private $albumCoverPath;

    public function __construct($con, $id)
    {
        $this->con = $con;
        $this->id = $id;

        $query = mysqli_query($this->con, "SELECT * FROM albums WHERE id='$this->id'");
        $album = mysqli_fetch_array($query);

        $this->title = $album['title'];
        $this->artistId = $album['artist'];
        $this->genre = $album['genre'];
        $this->albumCoverPath = $album['albumCoverPath'];
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getCover()
    {
        return $this->albumCoverPath;
    }

    public function getArtist()
    {
        return new Artist($this->con, $this->artistId);
    }

    public function getGenre()
    {
        return $this->genre;
    }

    public function getSongAmount() {
        $query = mysqli_query($this->con, "SELECT * FROM songs WHERE album='$this->id'");
        return mysqli_num_rows($query);
    }

    public function totalDuration() {
        $query = mysqli_query($this->con, "SELECT SUM(duration) FROM songs WHERE album='$this->id'");
        return mysqli_fetch_row($query)[0];
    }

    public function getSongId()
    {
        $query = mysqli_query($this->con, "SELECT id FROM songs WHERE album='$this->id' ORDER BY albumOrder ASC");
        $array = array();

        while ($row = mysqli_fetch_array($query)) {
            array_push($array, $row['id']);
        }

        return $array;
    }
}