<?php


class API
{       public function __construct(){
//            $url = 'https://api.themoviedb.org/3/';
//            $key = 'authentication/token/new?api_key=e0277e79b44b499f37fdd7bf160dd190';
//
//
//
//                $chuck = file_get_contents('https://api.themoviedb.org/3/authentication/token/new?api_key=e0277e79b44b499f37fdd7bf160dd190');
////                $str = json_decode($chuck);
//                return $chuck;

        }

        public function getToken(){
            $chuck = file_get_contents('https://api.themoviedb.org/3/authentication/token/new?api_key=e0277e79b44b499f37fdd7bf160dd190');
            $str = json_decode($chuck);
            $myTok = $str->request_token;
            return $myTok;
        }
        public function searchOnAPI($search){
            $link = file_get_contents('https://api.themoviedb.org/3/search/movie?api_key=e0277e79b44b499f37fdd7bf160dd190&language=en-US&query='.$search.'&page=1&include_adult=false');
            $listFound = json_decode($link);

            return $listFound->results;
        }
        public function searchByID($id){
            $link = file_get_contents('https://api.themoviedb.org/3/movie/'.$id.'?api_key=e0277e79b44b499f37fdd7bf160dd190&language=en-US');
            $listFound = json_decode($link);

            return $listFound;
        }
    public function searchVideoByID($id){
        $link = file_get_contents('https://api.themoviedb.org/3/movie/'.$id.'/videos?api_key=e0277e79b44b499f37fdd7bf160dd190&language=en-US');
        $video = json_decode($link);

        return $video;
    }
    public function getAllBest(){
        $link = file_get_contents('https://api.themoviedb.org/3/discover/movie?api_key=e0277e79b44b499f37fdd7bf160dd190&language=en-US&sort_by=vote_average.desc&include_adult=false&include_video=false&page=1&vote_count.gte=500&vote_average.gte=8&vote_average.lte=20');
        $listFound = json_decode($link);

        return $listFound;
    }
    public function getAllBestKids(){
        $link = file_get_contents('https://api.themoviedb.org/3/discover/movie?api_key=e0277e79b44b499f37fdd7bf160dd190&language=en-US&certification.lte=G&sort_by=popularity.desc');
        $listFound = json_decode($link);

        return $listFound;
    }
    public function getAllBestR(){
        $link = file_get_contents('https://api.themoviedb.org/3/discover/movie?api_key=e0277e79b44b499f37fdd7bf160dd190&certification_country=US&certification=R&sort_by=vote_average.desc');
        $listFound = json_decode($link);

        return $listFound;
    }
    public function getAllBestThisYear(){
        $link = file_get_contents('https://api.themoviedb.org/3/discover/movie?api_key=e0277e79b44b499f37fdd7bf160dd190&primary_release_year=2014');
        $listFound = json_decode($link);

        return $listFound;
    }

}