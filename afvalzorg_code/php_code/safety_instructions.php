<?php 

include '..\database\db.php';

if (!isset($_SESSION['loggedInWerknemer']) && !isset($_SESSION['loggedInLeverancier']) && !isset($_SESSION['loggedInChauffeur']) && !isset($_SESSION['loggedInWerkgever'])) {
    header("Location: login.php");
    exit;
}



?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Safety Instructions</title>
    </head>
    <body>
        <video width="400" controls>
  <source src="????" type="video/??">
  <source src="????" type="video/??">Your browser does not support HTML video.</video>
    </body>
</html>