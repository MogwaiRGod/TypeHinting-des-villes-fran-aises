<pre>
<?php

include '../DAO/CityDAO.php';

// les valeurs envoyées avec fetch utilisent la méthode GET => on les trouve dans $_GET
$zip = $_GET["zip"];

// mise en pratique de la requête (voir CityDAO pour le fonctionnement)
$cityDAO = new CityDAO;
$results = $cityDAO->getNameByZip($zip);

// affichage à l'arrache des résultats
var_dump($results);
