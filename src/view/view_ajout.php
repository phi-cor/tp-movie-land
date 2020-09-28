<?php
include 'src/view/header.php';



if (isset($_GET['modify']))
{ $x = 'modify='.$_GET['modify'];
}else{
    $x = 'add';
}
// Début des résultats de la recherche API
if (isset($_GET['film'])){
    echo '<div class="tile is-ancestor">
<div class="tile is-full-width">
    <div class="tile">
      <div class="tile is-parent"><article class="tile is-child notification is-6">
        <figure class="image is-full-width">
            <img src="https://image.tmdb.org/t/p/w500/'.$myFilm->poster_path.'">
          </figure> </article></div>
        </div>
        </div>
        
    <article class="tile is-child notification is-5">
      <div class="content">
        <p class="title">'.$myFilm->original_title.'</p><br>
        <p class="subtitle">'.$myFilm->vote_average.'</p><br>
        <p class="subtitle">'.$myFilm->overview.'</p><br>
        
        <div class="content"><br>
             <a href="?page=ajout&addAPI='.$_GET['film'].'" class="button is-warning is-fullwidth">Ajouter</a><br>
             <a href="?page=listeEnvie&add='.$_GET['film'].'" class="button is-danger is-fullwidth">Liste d\'envie</a>
        </div>
      </div>
    </article>
  
</div>
<iframe width="560" height="315" src="https://www.youtube.com/embed/'.$myBA->results[0]->key.'" 
frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
</iframe>';
}

if ($input == null) {
    foreach ($category as $key => $value) {
        $categoryOptions .= '<option value="'.$value["category_id"].'">' . $value["category_name"] . '</option>';
    }
    if (!isset($_GET['add'])) {
        if (isset($searchList)){
            $filmsCards='';
            foreach ($searchList as $key => $value){
                $filmsCards .= '<article class="tile is-child notification is-3">
                    <figure class="image is-full-width">
                        <a href="?page=ajout&film='.$value->id.'"><img src="https://image.tmdb.org/t/p/w500/'.$value->poster_path.'"></a>
                      </figure> </article>';
                        }


                                echo '<div class="tile is-ancestor">
                    <div class="tile is-full-width">
                        <div class="tile">
                          <div class="tile is-parent">'.$filmsCards.'</div>
                            </div>
                            </div>
                    </div>';
                            }
        /// FIN de la recherche API

                echo '<form method="post" action="?page=ajout&search">
                            <label class="label">Recherche en ligne</label>
                            <input type="text" class="input" name="search" placeholder="Nom du film">
                            
                            <input type="submit" class="input">
                        </form>



                        <h1 class="title"> OU </h1><br>
                            <form method="post" action="?page=ajout&'.$x.'">
                            <div class="field">
                            <label class="label">Name of the movie</label>
                          <p class="control has-icons-left has-icons-right">
                            <input class="input" type="text" name="name" value="'.$name.'" placeholder="Name">
                            <span class="icon is-small is-left">
                              <i class="fas fa-film"></i>
                            </span>
                            
                          </p>
                        </div>
                        
                        <div class="field">
                                          <label class="label">Select a movie category</label>
                                          <div class="control">
                                            <div  class="select is-fullwidth">
                                              <select value="'.$category2.'" name="category">' . $categoryOptions . '</select>
                                            </div>
                                          </div>
                                        </div>
                                        
                        <div class="field">
                            <label class="label">Image of the movie</label>
                          <p class="control has-icons-left has-icons-right">
                            <input value="'.$photo.'"class="input" type="text" name="photo" placeholder="Lien uniquement (Pour l\'instant)">
                            <span class="icon is-small is-left">
                              <i class="fas fa-film"></i>
                            </span>
                            
                          </p>
                        </div>       
                        
                        <div class="field">
                            <label class="label">Note of movie :</label>
                          <p class="control has-icons-left has-icons-right">
                            <input value="'.$note.'" class="input" type="text" name="note" placeholder="Note du film">
                            <span class="icon is-small is-left">
                              <i class="fas fa-film"></i>
                            </span>
                            
                          </p>
                        </div>   
                        <div class="has-content-centered">
                            <label class="checkbox">
                                  <input '.$seen.' value="" name="vu" type="checkbox">
                                  Film have been watched
                            </label>      
                        </div>             
                        
                        
                        
                        <input type="submit" class="button is-fullwidth" value='.$butt.'" le film">
                        </form>
                        ';
    }
}

include 'src/view/footer.php'; ?>