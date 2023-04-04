<?php

// import de la fonction permettant de se connecter à la BDD
require_once 'database.php';

// DAO des villes
class CityDAO {
    private $dbCo;

    // méthode retournant un tableau de noms de villes de la BDD selon le CP passé en argument
    public function getNameByZip($code) {
        // connexion à la BDD
        $this->dbCo = connectToDB();

        // la requête à envoyer
        $statement = "
            SELECT `ville_nom_reel` 
            FROM `villes_france_free` 
            WHERE `ville_code_postal` LIKE '" . $code ."%';" ; 

        // préparation de la requête
        // $query : objet PDO de la requête
        $query = $this->dbCo->prepare($statement);

        try {
            // exécution de la requête
            $query->execute();

            // récupération des résultats sous forme de tableau associatif
            $result = $query->fetchAll(PDO::FETCH_COLUMN);

            return $result;
        }
        catch (PDOException $e) {
            echo $e->getMessage();
        }


    } // fin getByZip
}