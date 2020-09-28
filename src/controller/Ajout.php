<?php


class Ajout
{   private $title;
    private $model;
    private $errorMsg;
    private $infoMsg;
    private $API;

    public function __construct()
    {
        $this->title = 'Ajout de film';
        $this->model = new Model();
        $this->errorMsg = '';
        $this->infoMsg = '';
        $this->API = new API();
    }

    public function manage() {
        $categoryOptions = '';
        $input = filter_input(INPUT_POST, 'name');
        $search = filter_input(INPUT_GET, 'search');
        $addAPI = filter_input(INPUT_GET, 'addAPI');

        if (isset($addAPI)){
            $myFilm = $this->API->searchByID($addAPI);
            $myBa = $this->API->searchVideoByID($addAPI);
            var_dump($myFilm);
            $myPic = 'https://image.tmdb.org/t/p/w500/'.$myFilm->poster_path;
            $this->model->addWishFilm($myFilm->original_title,$myPic,$myFilm->vote_average,1,1,$addAPI);

        }



        if (isset($search)){
            $searchList = $this->API->searchOnAPI($_POST['search']);


        }
        if (isset($_GET['film'])) {
            $myFilm = $this->API->searchByID($_GET['film']);
            $myBA = $this->API->searchVideoByID($_GET['film']);


        }

        if (isset($input)){
            $check = $this->checkInput();
            if ($check == true) {
            if (isset($_GET['add'])){
                if (isset($_POST['vu'])){$vu = $_POST['vu'];} else{$vu = 1;}
                $check = $this->model->addFilm($_POST['name'], $_POST['category'],$_POST['photo'], $_POST['note'],$vu);
                $foo = 'ajouté !';
            }elseif (isset($_GET['modify'])){
                if (isset($_POST['vu'])){$vu = $_POST['vu'];} else{$vu = 1;}
                $check = $this->model->updateFilm($_POST['name'], $_POST['category'],$_POST['photo'], $_POST['note'],$vu,$_GET["modify"]);
                $foo = 'modifié !';

            }
                if ($check == true) {
                    $this->infoMsg .= '<br><div class="notification is-success">
                                  <strong>Votre film a été '.$foo.'</strong>
                              </div>';
                }else{ $this->errorMsg = '<div class="notification is-warning">
                                  <strong>Le film n\'a pas pu être ajouté</strong>
                              </div>'; }
            }
        }
        $category = $this->model->getCategories();
//        var_dump();
        if (isset($_GET['modify'])){
            $x = $this->model->getOneFilms('WHERE movie_id = ?',$_GET['modify']);
            $name = $x['movie_name'];
            $category2 = $x['id_category'];
            $photo = $x['movie_image'];
            $note = $x['movie_note'];
            $id = $_GET['modify'];
            $butt = 'Modifier';
            if ($x['movie_seen']===1){$seen = '';}else{$seen = 'checked';}


        }else {
            $name = '';
            $category2 = '';
            $photo = '';
            $note = '';
            $seen = '';
            $id='';
            $butt = 'Ajouter';
        }

            include 'src/view/view_ajout.php';
        }
        public function checkInput(){
            if ($_POST['name'] == '' OR $_POST['category'] == '' OR $_POST['photo'] == '' OR $_POST['note'] == ''){
                $this->errorMsg = '<div class="notification is-warning">
                                  <strong>Vous n\'avez pas rempli le formulaire correctement</strong>
                              </div>';
                return false;
            }else{
                $this->infoMsg = '<div class="notification is-success">
                                  <strong>Vous avez rempli le formulaire correctement</strong>
                              </div>';
                return true;
            }
        }


}