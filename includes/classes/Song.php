<?php

class Song
{
    private $con;
    private $id;
    private $data;
    private $title;
    private $artistId;
    private $albumId;
    private $genre;
    private $duration;
    private $path;
    private $plays;


    public function __construct($con, $id)
    {
        $this->con = $con;
        $this->id = $id;

        $query = mysqli_query($this->con, "SELECT * FROM songs WHERE id='$this->id'");
        $this->data = mysqli_fetch_array($query);

        $this->title = $this->data['title'];
        $this->artistId = $this->data['artist'];
        $this->albumId = $this->data['album'];
        $this->genre = $this->data['genre'];
        $this->duration = $this->data['duration'];
        $this->path = $this->data['path'];
        $this->plays = $this->data['plays'];
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getArtist()
    {
        return new Artist($this->con, $this->artistId);
    }

    public function getAlbum()
    {
        return new Album($this->con, $this->albumId);
    }

    public function getGenre()
    {
        return $this->genre;
    }

    public function getDuration()
    {
        return $this->duration;
    }

    public function getPath()
    {
        return $this->path;
    }

    public function getPlays()
    {
        return $this->plays;
    }

    public function getData()
    {
        return $this->data;
    }
}