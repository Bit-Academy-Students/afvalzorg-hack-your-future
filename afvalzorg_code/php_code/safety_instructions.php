<?php 

include '..\database\db.php';

if (!isset($_SESSION['loggedInWerknemer']) && !isset($_SESSION['loggedInLeverancier']) && !isset($_SESSION['loggedInChauffeur']) && !isset($_SESSION['loggedInWerkgever'])) {
    header("Location: login.php");
    exit;
}

$location = $_GET['location'];

$locationinstruction = $pdo->prepare("SELECT * FROM locations WHERE location = :location");
$locationinstruction->bindParam(':location', $location);
$locationinstruction->execute();
$locationinstruction->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Safety Instructions</title>
    </head>
    <body>
        
    </body>
</html>