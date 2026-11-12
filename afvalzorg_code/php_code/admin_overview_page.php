<?php

session_start();
require_once("../database/db.php");

if (!isset($_SESSION['loggedInWerkgever'])) {
    ?>
    <H1>U heeft geen toegang tot deze pagina!</H1>
    <?php
    ?>
    <a href="home.php">terug naar startpagina</a> 
    <?php
    die();
} else
$userid = $_SESSION['loggedInWerkgever'];

$account_info = $pdo->query('SELECT * FROM users');
$account_info->execute();

?>
<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="../js_code/script.js" defer></script>
    <link rel="stylesheet" href="../css_code/style.css">
</head>
<body>
    <table>
        <tr>
            <th>user id</th>
            <th>voornaam</th>
            <th>achternaam</th>
            <th>rol</th>
            <th>locatie</th>
        </tr>
        <?php foreach ($account_info as $A) {?>
            <tr>
                <td><?= $A['userid'] ?></td>
                <td><?= $A['voornaam'] ?></td>   
                <td><?= $A['achternaam'] ?></td>
                <td><?= $A['persoon'] ?></td>
                <td><?= $A['location'] ?></td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>