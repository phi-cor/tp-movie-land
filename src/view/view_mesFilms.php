<?php
include 'src/view/header.php';
if (isset($this->filmList)){
$filmsCards = '';
    echo '<a href="?page=mesFilms&tri=tous" class="button is-rounded">Tous</a> 
<a href="?page=mesFilms&tri=pasVu" class="button is-rounded">Seulement les non vus</a>  
<a href="?page=mesFilms&tri=vu" class="button is-rounded">Seulement les vus</a> 
<a href="?page=mesFilms&tri=note" class="button is-rounded">Classé par note</a>  
<a href="?page=mesFilms&tri=AtoZ" class="button is-rounded">De A à Z</a> <br>';

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
//var_dump($this->film);
if (!empty($this->film)){
   if ($this->film['movie_seen'] == 1 ){
       $vu = "Pas vu !";
   }elseif ($this->film['movie_seen'] == 0 ){
       $vu = "Déjà vu !";
   }
   $star ='';
    for ($i = 0 ; $i < $this->film['movie_note'] ;  $i++){
        $star .= ' ⭐ ';
    }
    $progress = $this->film['movie_note']*10;

    if ($progress<25){
        $color2 = 'is-danger';
    }elseif ($progress <50 AND $progress >25){
        $color2 = 'is-warning';
    }elseif ($progress<75 AND $progress >50){
    $color2='is-info';
    }elseif ($progress<100 AND $progress >75){
        $color2='is-success';}

    if ($this->film['movie_archived']==1){
        $color = 'is-success';
    }else {
        $color = 'is-warning';
    }




    echo '<progress class="progress '.$color2.'" value="'.$progress.'" max="100"></progress>
<div class="tile is-ancestor">
<div class="tile is-full-width">
    <div class="tile">
      <div class="tile is-parent"><article class="tile is-child notification is-6">
        <figure class="image is-full-width">
            <a href="?page=mesFilms&film='.$this->film['movie_id'].'"><img src="'.$this->film['movie_image'].'"></a>
          </figure> </article></div>
        </div>
        </div>
        
    <article class="tile is-child notification '.$color.' is-5">
      <div class="content">
        <p class="title">'.$this->film['movie_name'].'</p><br>
        <p class="subtitle">'.$this->film['category_name'].'</p><br>
        <p class="subtitle">'.$vu.'</p><br>
        <p class="subtitle">'.$star.'</p><br>
        
        <div class="content"><br>
             <a href="?page=ajout&modify='.$this->film['movie_id'].'" class="button is-warning is-fullwidth">Modifier</a><br>
             <a href="?page=mesFilms&archiver='.$this->film['movie_id'].'" class="button is-danger is-fullwidth">Archiver</a>
        </div>
      </div>
    </article>
  
</div>';
    if (isset($myBA)){
        echo '<iframe width="560" height="315" src="https://www.youtube.com/embed/'.$myBA->results[0]->key.'"
frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
</iframe>';
    }
    var_dump($this->film['movie_id']);
}

include 'src/view/footer.php';
