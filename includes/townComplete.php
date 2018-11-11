<?php

require_once("../dbConnect.php");
$town = filter_input(INPUT_POST, "town"); //receive data from formComplete.js

$countyID = $_POST["county"];

$queryCounty = "SELECT townName, townID, countyID FROM towns WHERE countyID = $countyID";  //use this input in sql search to retrieve necessary data
$statement = $db->prepare($queryCounty);
$statement->execute();
$towns = $statement->fetchAll();
$statement->closeCursor();

$townArr = array();

foreach ($towns as $tRow): //for each row returned in sql search
    $townArr[$tRow["townName"]] = $tRow["townID"]; //associative array with element name being town name and value being town id
endforeach;

echo json_encode($townArr);