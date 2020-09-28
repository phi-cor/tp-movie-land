<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?php $this->title ?>
    </title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.0/css/bulma.min.css">

</head>
<body>
<header>
    <nav class="navbar" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
            <a href="?page=home" class="navbar-item">
                <img src="https://i.pinimg.com/564x/c8/0f/ee/c80fee96445ac77e22c7bc721bc1d902.jpg" width="100" height="150">
            </a>

            <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                <span aria-hidden="false"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>

        <div id="navbarBasicExample" class="navbar-menu">
            <div class="navbar-start">
                <a href="?page=home" class="navbar-item">
                    Home
                </a>

                <a href="?page=mesFilms" class="navbar-item">
                    Mes films
                </a>

                <a href="?page=ajout" class="navbar-item">
                    Ajout de film
                </a>

                <a href="?page=categorie" class="navbar-item">
                    Catégories
                </a>

                <a href="?page=archives" class="navbar-item">
                    Archive
                </a>
                <a href="?page=prets" class="navbar-item">
                    Prêts
                </a>
                <a href="?page=listeEnvie" class="navbar-item">
                    Liste d'envie
                </a>


            </div>

        </div>
    </nav>
</header>
<main>
<div class="columns is-multiline">
    <div class="column is-one-fifth">

    </div>
    <div class="column is-three-fifths">
<?php if (isset($this->errorMsg)){echo $this->errorMsg; } ?>
<?php if (isset($this->infoMsg)){echo $this->infoMsg; }
        echo '<h1 class="title"> '.$this->title.' </h1>';
