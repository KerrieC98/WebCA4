<?php
require_once("dbConnect.php");

$queryCountry = "SELECT country, id FROM countries";
$statement = $db->prepare($queryCountry);
$statement->execute();
$country = $statement->fetchAll();
$statement->closeCursor();

$queryCounty = "SELECT name, id FROM counties";
$statement = $db->prepare($queryCounty);
$statement->execute();
$county = $statement->fetchAll();
$statement->closeCursor();

$queryTown = "SELECT townName FROM towns";
$statement = $db->prepare($queryTown);
$statement->execute();
$town = $statement->fetchAll();
$statement->closeCursor();
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
        <script src="js/formComplete.js" type="text/javascript"></script>
        <link href="css/css.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <h1>Please fill out the following...</h1>
        <div id = formDiv>
        <form action="formResults.php" method="post">
            <label>Name: </label>
            <input type="text" name="name"/><br/>
            <label>Surname: </label>
            <input type="text" name="surname"/><br/>
            <label>Street Line 1: </label>
            <input type="text" name="streetLine1"/><br/>
            <label>Street Line 2: </label>
            <input type="text" name="streetLine2"/><br/>
            <label>Country:</label>
            
            
            <input type="text" list="country" id="country2" name="country"><br/>
            <datalist id="country"> <!-- empty datalist to be filled with countries -->

            </datalist>
            <label id="countyLabel">County:</label>
            <select name="county" id="county"><br/> <!-- empty select to be filled with counties -->
               
            </select>
        
            <label id="townLabel">Town: </label>
            <select name="town" id="town"><br/> <!-- empty select to be filled with towns -->
          
            </select>
            </div>
            <input id="submit" type="submit" value="submit">
        </form>
       
    </body>
</html>
