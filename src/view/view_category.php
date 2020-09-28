<?php
include 'src/view/header.php';
echo '<form method="post" action="?page=categorie&add"><div class="field">
  <div class="control">
    <input class="input is-info" type="text" name="nomDeCategorie" placeholder="Info input">
  </div>
  <input class="button is-fullwidth" type="submit" value="Ajouter la catégorie">
</div></form><br><br><br>';

foreach ($categoryList as $key => $value){
    echo '<div class="notification is-info level">
  <strong>'.$value["category_name"].'</strong><a class="level-right" href="?page=categorie&delete='.$value["category_id"].'">❌</a>
</div>';
}



include 'src/view/footer.php';