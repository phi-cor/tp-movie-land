<?php


class Prets
{   private $title;
    private $infoMsg;
    private $model;

    public function __construct()
    {
        $this->title = 'Prêts';
        $this->infoMsg = '';
        $this->model = new Model();    }


    public function manage() {


        if (isset($_POST['nom']) AND isset($_POST['date']) AND isset($_POST['nomDuFilm'])){
            if ($_POST['nom']!= "" AND $_POST['date'] != "" AND $_POST['nomDuFilm'] != ""){
                $check = $this->model->addPrets($_POST['nom'],$_POST['date'],$_POST['nomDuFilm']);
                if ($check == true){
                    $this->infoMsg= '<br><div class="notification is-success">
                                  <strong>Votre prêt a été ajouté</strong>
                              </div>';
                }else {
                    $this->infoMsg = '<div class="notification is-warning">
                                  <strong>Le film n\'a pas pu être ajouté</strong>
                              </div>';
                }


            }
        }
        if (isset($_GET['return'])){
            $check = $this->model->deletePret($_GET['return']);
            if ($check == true){
                $this->infoMsg= '<br><div class="notification is-success">
                                  <strong>Votre prêt a été supprimmé</strong>
                              </div>';
            }else {
                $this->infoMsg = '<div class="notification is-warning">
                                  <strong>Le prêt n\'a pas pu être supprimmé</strong>
                              </div>';
            }
        }
        $filmsList = $this->model->getFilms('','');
        $pretsList = $this->model->getPrets();

        include 'src/view/view_prets.php';
    }



}