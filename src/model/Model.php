<?php


class Model
{
    public function __construct(){
        $host = 'localhost';
        $user = 'root';
        $password = '';
        $dbname = "movie_land";

        try {
            $this->BDD = new PDO ("mysql:host=$host;dbname=$dbname;charset=utf8",
                $user,$password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }catch (Exception $e){
            var_dump( 'Echec lors de la tentative de connexion : '. $e->getMessage() );
        }
    }

    /**
     * @return PDO
     */
    public function getFilms($sql, $exec)
    {
        try{
            $request = $this->BDD->prepare('SELECT * FROM movie LEFT JOIN category ON movie.id_category = category.category_id '.$sql);
            $request->execute(array($exec));

            $films = $request->fetchAll();

            return $films;

        }catch(Exception $e){
            var_dump( 'Echec lors de la tentative de connexion : '. $e->getMessage() );
            echo "Raté !";
            return false;
        }
    }

    public function getOneFilms($sql, $exec)
    {
        try{
            $request = $this->BDD->prepare('SELECT * FROM movie LEFT JOIN category ON movie.id_category = category.category_id '.$sql);
            $request->execute(array($exec));

            $films = $request->fetch();

            return $films;

        }catch(Exception $e){
            var_dump( 'Echec lors de la tentative de connexion : '. $e->getMessage() );
            echo "Raté !";
            return false;
        }
    }

    /**
     * @return PDO
     */
    public function getCategories()
    {
        try{
            $request = $this->BDD->prepare('SELECT * FROM category ');
            $request->execute();

            $category = $request->fetchAll();

            return $category;

        }catch(Exception $e){
            var_dump( 'Echec lors de la tentative de connexion : '. $e->getMessage() );
            echo "Raté !";
            return false;
        }
    }


    public function addFilm($name,$category,$photo,$note,$vu)
    {
        try{

            $request = $this->BDD->prepare('INSERT INTO movie (movie_name,
                                                                        id_category,
                                                                        movie_image,
                                                                        movie_note,
                                                                        movie_seen)
                                                                    VALUES ( ? , ? , ? , ? , ?)');
            $request->execute(array($name,$category,$photo,$note,$vu));

            return $check = true;
        }catch(Exception $e){
            var_dump( 'Echec lors de la tentative de connexion : '. $e->getMessage() );

            return $check = false;
        }
    }
    public function addWishFilm($name,$photo,$note,$vu,$wish,$idAPI)
    {
        try{

            $request = $this->BDD->prepare('INSERT INTO movie (movie_name,
                                                                        movie_image,
                                                                        movie_note,
                                                                        movie_seen,
                                                                        movie_wishList,
                                                                        movie_id_api)
                                                                    VALUES ( ? , ? , ? , ?, ?, ?)');
            $request->execute(array($name,$photo,$note,$vu,$wish,$idAPI));

            return $check = true;
        }catch(Exception $e){
            var_dump( 'Echec lors de la tentative de connexion : '. $e->getMessage() );

            return $check = false;
        }
    }

    public function Archive($id){
        $x = $this->getOneFilms('WHERE movie_id = ?', $id);
        if ($x['movie_archived'] == 1){
            $arch = 0;
        }elseif ($x['movie_archived'] == 0){
            $arch = 0;
        }
        try {
            $request = $this->BDD->prepare('UPDATE movie SET movie_archived = ? WHERE movie_id = ?');
            $request->execute(array($arch,$id));
            return true;

        } catch (Exception $e) {
            var_dump("Errors are :" . $e ->getMessage());
            return false;
        }
    }

    public function updateFilm($name,$category,$photo,$note,$vu,$id)
    {
        try{

            $request = $this->BDD->prepare('UPDATE movie SET movie_name = ? , 
                                                    id_category = ? , movie_image = ? ,
                                                     movie_note = ? , movie_seen = ?
                                                      WHERE movie_id = ?');
            $request->execute(array($name,$category,$photo,$note,$vu,$id));

            return true;
        }catch(Exception $e){
            var_dump( 'Echec lors de la tentative de connexion : '. $e->getMessage() );

            return false;
        }
    }

    public function deleteCategory($id){
        try {

            $request = $this->BDD->prepare('DELETE FROM category WHERE category_id = ?');
            $request->execute(array(
                $id
            ));
            return true;
            } catch (Exception $e) {
            var_dump("Errors are :" . $e ->getMessage());
            return false;
        }
    }
    public function addCategory($name)
    {
        try{

            $request = $this->BDD->prepare('INSERT INTO category (category_name)
                                                                    VALUES ( ?)');
            $request->execute(array($name));

            return $check = true;
        }catch(Exception $e){
            var_dump( 'Echec lors de la tentative de connexion : '. $e->getMessage() );

            return $check = false;
        }
    }
    public function addPrets($name,$date,$category)
    {
        try{

            $request = $this->BDD->prepare('INSERT INTO prets (pret_name,
                                                                        pret_date,
                                                                        film_pret)
                                                                    VALUES ( ? , ? , ? )');
            $request->execute(array($name,$date,$category));

            return $check = true;
        }catch(Exception $e){
            var_dump( 'Echec lors de la tentative de connexion : '. $e->getMessage() );

            return $check = false;
        }
    }
    public function deletePret($id){
        try {

            $request = $this->BDD->prepare('DELETE FROM prets WHERE pret_id = ?');
            $request->execute(array(
                $id
            ));
            return true;
        } catch (Exception $e) {
            var_dump("Errors are :" . $e ->getMessage());
            return false;
        }
    }
    /**
     * @return PDO
     */
    public function getPrets()
    {
        try{
            $request = $this->BDD->prepare('SELECT * FROM prets LEFT JOIN movie ON prets.film_pret = movie.movie_id');
            $request->execute(array());

            $films = $request->fetchAll();

            return $films;

        }catch(Exception $e){
            var_dump( 'Echec lors de la tentative de connexion : '. $e->getMessage() );
            echo "Raté !";
            return false;
        }
    }
}