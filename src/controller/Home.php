<?php


class Home
{   private $title;
    private $API;

    public function __construct()
    {
        $this->title = 'Home';
        $this->API = new API();
    }


    public function manage() {

//        $token = $this->API->getToken();



        include 'src/view/view_home.php';
    }



}