<?php

require_once("../dbConnect.php");
$country = filter_input(INPUT_POST, "country"); //receive data from formComplete.js

$countryID = $_POST["country"];
$queryCountry = "SELECT name, id FROM counties WHERE country_id = $countryID"; //use this input in sql search to retrieve necessary data
$statement = $db->prepare($queryCountry);
$statement->execute();
$counties = $statement->fetchAll();
$statement->closeCursor();

$countyArr = array();

foreach ($counties as $cRow): //for each row returned in sql search
    $countyArr[$cRow["name"]] = $cRow["id"]; //associative array with element name being country name and value being id
endforeach;

echo json_encode($countyArr); //encode array
