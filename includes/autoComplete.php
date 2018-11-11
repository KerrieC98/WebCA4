<?php

require_once("../dbConnect.php");
$letters = filter_input(INPUT_POST, "letters"); //receive input from formComplete.js
$country = filter_input(INPUT_POST, "country");

$countryID = $_POST["letters"];

$queryCountry = "SELECT country, id FROM countries WHERE country like '$letters%'"; //use this input in sql search to retrieve necessary data
$statement = $db->prepare($queryCountry);
$statement->execute();
$countries = $statement->fetchAll();
$statement->closeCursor();

$countryArr = array();

foreach ($countries as $cRow): //for each row returned in sql search

    $countryArr[$cRow["id"]] = $cRow["country"]; //associative array with element name being id and value being country
endforeach;

echo json_encode($countryArr); //encode array
