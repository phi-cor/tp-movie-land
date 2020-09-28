<?php


class Archives
{   private $title;
    private $model;
    private $filmList;

    public function __construct()
    {
        $this->title = 'Films Archivés';
        $this->model = new Model();
        $this->filmList = array();
    }


    public function manage() {
        $this->filmList = $this->model->getFilms('WHERE movie_archived = ?',0);

        include 'src/view/view_archives.php';
    }

}