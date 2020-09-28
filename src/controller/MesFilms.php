<?php


class MesFilms
{   private $title;
    private $model;
    private $filmList;
    private $errorMsg;
    private $film;
    private$API;


    public function __construct()
    {
        $this->title = 'Mes films';
        $this->model = new Model();
        $this->filmList = array();
        $this->errorMsg = "";
        $this->film = array();
        $this->API = new API();
    }

    public function manage() {

        if (isset($_GET['archiver'])){
            $x = $this->model->Archive($_GET['archiver']);
//            var_dump($x);
        }
        if (!isset($_GET['film'])){
            if (!isset($_GET['tri'])){
                $this->filmList = $this->model->getFilms('WHERE movie_archived = ? AND movie_wishList = 1',1);
            }
            if (isset($_GET['tri'])){
                if ($_GET['tri']=='tous'){
                    $this->filmList = $this->model->getFilms('WHERE movie_archived = ?',1);
                }elseif ($_GET['tri']=='AtoZ') {
                    $this->filmList = $this->model->getFilms('WHERE movie_archived = ?  ORDER BY movie_name', 1);
                }elseif ($_GET['tri']=='vu') {
                    $this->filmList = $this->model->getFilms('WHERE movie_archived = ?  AND movie_seen = 0', 1);
                }elseif ($_GET['tri']=='pasVu') {
                    $this->filmList = $this->model->getFilms('WHERE movie_archived = ?  AND movie_seen = 1', 1);
                }elseif ($_GET['tri']=='note') {
                    $this->filmList = $this->model->getFilms('WHERE movie_archived = ?  ORDER BY movie_note DESC', 1);
                }



            }
            if ($this->filmList === false){
                $this->errorMsg = '<div class="notification is-warning">
                                      <strong>Impossible de récupérer la liste des films</strong>
                                  </div>';
            }elseif (count($this->filmList)<= 0){
                $this->errorMsg = '<div class="notification is-warning">
                                      <strong>La liste de film est vide</strong>
                                  </div>';
            }
        }else{
            $x = $_GET['film'];
            $this->film = $this->model->getOneFilms('WHERE movie_id = ?', $x);
            if ($this->film["movie_id_api"] != null){
               $myBA =  $this->API->searchVideoByID($this->film["movie_id_api"]);

            }

            if ($this->film === false){
                $this->errorMsg = '<div class="notification is-warning">
                                  <strong>Impossible de récupérer ce film</strong>
                              </div>';
            }

        }




        include 'src/view/view_mesFilms.php';
    }

}