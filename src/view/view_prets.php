<?php
include "header.php";

foreach ($pretsList as $key => $value){
    echo '<div class="notification is-info level">
  <strong>'.$value["pret_name"].'</strong> '.$value["pret_date"].' <a class="level-right" href="?page=prets&return='.$value["pret_id"].'">❌</a>
</div>';
}


$filmsOptions = '';
foreach ($filmsList as $key => $value){
    $filmsOptions .= '<option value="'.$value["movie_id"].'">' . $value["movie_name"] . '</option>';
}

echo '<h2 class=title">Formulaire de prêts </h2>
<form method="post" action="?page=prets">
<input type="text" class="input" name="nom" placeholder="Nom de l\'emprunteur">
<input type="date"  class="input" name="date" >
<select class="input" name="nomDuFilm">'.$filmsOptions.'</select>
<input type="submit" class="input">
</form>';





include "footer.php";
