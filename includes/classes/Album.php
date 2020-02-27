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

        $query = mysqli_query($this->con, "SELECT * FROM Albums WHERE id='$this->id'");
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
}