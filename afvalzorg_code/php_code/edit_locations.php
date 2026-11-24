<?php

session_start();
require_once("../database/db.php");
if (!isset($_SESSION['locationid'])) {
    ?>
    <a href="admin_overview_page.php">geen locatie opgegeven</a>
    <?php
    exit();
}
$lo_id = $_SESSION['locationid'];
    
$location_info = $pdo->prepare('SELECT * FROM locations WHERE locationid = :lo_id');
$location_info->bindParam('lo_id', $lo_id);
$location_info->execute();
$location_info = $location_info->fetch();

if (!$location_info) {
    die("Locatie niet gevonden!");
}

if (!isset($_SESSION['loggedInWerkgever'])) {
    ?>
    <H1>U heeft geen toegang tot deze pagina!</H1>
    <a href="home.php">terug naar startpagina</a> 
    <?php
    die();
    }
    
    if (isset($_POST['opslaan'])) {
        if (!empty($_POST['location_name']) || !empty($_POST['safety'])) {
            $name = $_POST['location_name'];
            $safety_instructions = $_POST['safety'];
            $update_locations = $pdo->prepare("UPDATE locations SET location = :location, safety_instr = :safety_instruction WHERE locationid");
            $update_locations->bindParam('location', $name);
            $update_locations->bindParam('safety_instruction', $safety_instructions);
            $update_locations->execute();
            header("location: edit_locations.php");
        }
    }
?>
<!DOCTYPE html>
<html lang="EN">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>editing Product</title>
        <link rel="stylesheet" href="main.css">
        <link rel="stylesheet" href="edit.css">
    </head>
    <body>
        
        <form method="POST">
            <h1>locatie informatie aanpassen</h1>
            
            <label for="location_name">locatie naam</label><br>
            <input type="text" name="location_name" id="location_name" value="<?= $location_info['location'] ?>" required><br>
            
            <label for="safety">veiligheids instructie   :</label><br>
            <textarea name="safety" id="safety"><?= $location_info['safety_instr'] ?></textarea><br>
            <input type="submit" id = "opslaan" name="opslaan" value="opslaan">
            <a href="admin_overview_page.php">terug</a>
        </form>
        
    </body>
    </html>