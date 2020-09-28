<?php


class Category
{   private $title;
    private $model;
    private $infoMsg;

    public function __construct()
    {
        $this->title = 'Catégories';
        $this->model = new Model();
        $this->infoMsg = '';

    }


    public function manage() {

        if (isset($_GET['delete'])){
            $check = $this->model->deleteCategory($_GET['delete']);
            if ($check == true){
                $this->infoMsg = '<div class="notification is-success">
                                  <strong>Vous avez bien supprimmer la catégorie</strong>
                              </div>';
            }else {
                $this->infoMsg = '<div class="notification is-warning">
                                  <strong>Vous n\'avez pas rempli le formulaire correctement</strong>
                              </div>';

            }

        }
        if (isset($_GET['add'])){
            $check = $this->model->addCategory($_POST['nomDeCategorie']);
            if ($check == true){
                $this->infoMsg = '<div class="notification is-success">
                                  <strong>Vous avez bien ajouté la catégorie</strong>
                              </div>';
            }else {
                $this->infoMsg = '<div class="notification is-warning">
                                  <strong>Vous n\'avez pas ajouté la catégorie</strong>
                              </div>';

            }

        }
        $categoryList = $this->model->getCategories();

        include 'src/view/view_category.php';
    }

}