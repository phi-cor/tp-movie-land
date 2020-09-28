<?php
include 'src/view/header.php';

if (isset($this->filmList)){
    $filmsCards = '';

    foreach ($this->filmList as $key => $value){
        $filmsCards .= '<article class="tile is-child notification is-3">
        <figure class="image is-full-width">
            <a href="?page=mesFilms&film='.$value['movie_id'].'"><img src="'.$value['movie_image'].'"></a>
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

include 'src/view/footer.php';