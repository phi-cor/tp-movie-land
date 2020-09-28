<?php


class ListeEnvie
{
    private $title;
    private $API;
    private $model;
    private $infoMsg;

    public function __construct()
    {
        $this->title = 'Liste d\'envie';
        $this->API = new API();
        $this->model = new Model();
        $this->infoMsg = '';
    }


    public function manage()
    {       if (isset($_GET['tri'])){
                if ($_GET['tri']==='allBest'){
        $searchList = $this->API->getAllBest();
        }   elseif ($_GET['tri']==='allBestKid'){
                    $searchList = $this->API->getAllBestKids();
                }elseif ($_GET['tri']==='R'){
                    $searchList = $this->API->getAllBestR();
                }elseif ($_GET['tri']==='bestThisYear'){
                    $searchList = $this->API->getAllBestThisyear();
                }

//        var_dump($searchList->results);

    }else{




            if (isset($_GET['add'])) {
                $myFilm = $this->API->searchByID($_GET['add']);
                $myBA = $this->API->searchVideoByID($_GET['add']);
//                var_dump($myFilm);
//                var_dump($wishList);->id
                $myPic = 'https://image.tmdb.org/t/p/w500/'.$myFilm->poster_path;
                $check = $this->model->addWishFilm($myFilm->original_title,$myPic,$myFilm->vote_average,1,0,$_GET['add']);
                if ($check == true) {
                    $this->infoMsg = '<div class="notification is-success">
                                  <strong>Film ajouté</strong>
                              </div>';
                } else {
                    $this->infoMsg = '<div class="notification is-warning">
                                  <strong>Erreur lors de l\'ajout</strong>
                              </div>';    }
            }

        $wishList = $this->model->getFilms('WHERE movie_wishList = ?', 0);

        if ($wishList == true) {
            $this->infoMsg = '<div class="notification is-success">
                                  <strong>Liste importée</strong>
                              </div>';
        } else {
            $this->infoMsg = '<div class="notification is-warning">
                                  <strong>Liste vide</strong>
                              </div>';    }
    }
            include 'src/view/view_listeEnvie.php';
        }




}