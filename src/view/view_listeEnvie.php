<?php
include "header.php";

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


      </div>
    </article>

</div>
<iframe width="560" height="315" src="https://www.youtube.com/embed/'.$myBA->results[0]->key.'"
frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
</iframe>';
}

echo '<a href="?page=listeEnvie&tri=allBest" class="button is-rounded">Meilleurs films de tous les temps</a> 
<a href="?page=listeEnvie&tri=allBestKid" class="button is-rounded">Meilleurs films kids</a>  
<a href="?page=listeEnvie&tri=R" class="button is-rounded">Meilleurs films rated R</a> 
<a href="?page=listeEnvie&tri=bestThisYear" class="button is-rounded">Meilleur cette année</a>  
<a href="?page=mesFilms&tri=AtoZ" class="button is-rounded">De A à Z</a> <br>';


    if (isset($_GET['tri'])) {
        if (isset($searchList)) {
            $filmsCards = '';
            foreach ($searchList->results as $key => $value) {
                $filmsCards .= '<article class="tile is-child notification is-3">
                    <figure class="image is-full-width">
                        <a href="?page=ajout&film=' . $value->id . '"><img src="https://image.tmdb.org/t/p/w500/' . $value->poster_path . '"></a>
                      </figure> </article>';
            }


            echo '<div class="tile is-ancestor">
                    <div class="tile is-full-width">
                        <div class="tile">
                          <div class="tile is-parent">' . $filmsCards . '</div>
                            </div>
                            </div>
                    </div>';
        }
    }


        if (!empty($wishList)) {
//            var_dump($wishList);
            $filmsCards = '';
            foreach ($wishList as $key => $value) {
                $filmsCards .= '<article class="tile is-child notification is-3">
                    <figure class="image is-full-width">
                        <a href="?page=ajout&film=' . $value['movie_id_api']. '"><img src="' . $value['movie_image'] . '"></a>
                      </figure> </article>';
            }


            echo '<div class="tile is-ancestor">
                    <div class="tile is-full-width">
                        <div class="tile">
                          <div class="tile is-parent">' . $filmsCards . '</div>
                            </div>
                            </div>
                    </div>';
        }


include "footer.php";