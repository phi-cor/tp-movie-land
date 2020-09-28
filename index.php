<?php

session_start();


require 'src/controller/Home.php';
require 'src/controller/Ajout.php';
require 'src/controller/MesFilms.php';
require 'src/controller/Category.php';
require 'src/controller/Archives.php';
require 'src/controller/Prets.php';
require 'src/controller/ListeEnvie.php';

require 'src/model/Model.php';
require 'src/model/API.php';
$page = filter_input(INPUT_GET, 'page');

//var_dump($page);

// Liste des Class pour chaque Page
$route = array(
    'home' => Home::class,
    'ajout' => Ajout::class,
    'mesFilms' => MesFilms::class,
    'categorie' => Category::class,
    'archives' => Archives::class,
    'prets' => Prets::class,
    'listeEnvie' => ListeEnvie::class
);


foreach ($route as $routeValue => $className) {

    if ($page === $routeValue) {

       $controller = new $className;
       $controller->manage();
       break;
       }

}

if (!isset($controller)) {
    // ERROR 404
    $controller = new Home();
    $controller->manage();
}

