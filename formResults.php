<?php
require_once("dbConnect.php");

$name = filter_input(INPUT_POST, "name");
$surname = filter_input(INPUT_POST, "surname");
$streetLine1 = filter_input(INPUT_POST, "streetLine1");
$streetLine2 = filter_input(INPUT_POST, "streetLine2");
$country = filter_input(INPUT_POST, "country");
$countyID = filter_input(INPUT_POST, "county");
$townID = filter_input(INPUT_POST, "town");

$queryCounty = "SELECT name FROM counties WHERE id = $countyID";
$statement = $db->prepare($queryCounty);
$statement->execute();
$county = $statement->fetch();
$statement -> closeCursor();

$queryTown = "SELECT townName FROM towns WHERE townID = $townID AND countyID = $countyID";
$statement = $db->prepare($queryTown);
$statement->execute();
$town = $statement->fetch();
$statement -> closeCursor();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="css/css.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        
         <h1>Thank you for filling out the form!</h1>
        
        <div id="formDiv">
        <label>Name:</label>
        <span><?php echo $name; ?></span><br/>
        <label>Surname:</label>
        <span><?php echo $surname; ?></span><br/>
        <label>Street Line 1: </label>
        <span><?php echo $streetLine1; ?></span><br/>
        <label>Street Line 2:</label>
        <span><?php echo $streetLine2; ?></span><br/>
        <label>Country:</label>
        <span><?php echo $country; ?></span><br/>
        <label>County:</label>
        <span><?php echo $county[0]; ?></span><br/>
        <label>Town:</label>
        <span><?php echo $town[0]; ?></span><br/>
        </div>
        </body>
</html>
