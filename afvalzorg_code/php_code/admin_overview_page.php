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

$locations = $pdo->query('SELECT * FROM locations');
$locations->execute();



?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="../js_code/script.js" defer></script>
    <script src="../js_code/admin_page.js" defer></script>
    <link rel="stylesheet" href="../css_code/style.css">
    <link rel="stylesheet" href="../css_code/admin.css">
</head>
<body>
    <div class="navbar">
        <a href="home.php" id="navbarbegin">home</a>
        <a href="??">locatie</a>
        <a href="Logout.php">Uitloggen</a>
        <?php if (isset($_SESSION['loggedInWerkgever'])) {?>
        <a href="admin_overview_page.php">admin page</a>
        <?php } ?>
        <div class="dropdown">
            <button class="dropbtn">taal v
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <button id="btnNl">nederlands</button>
                <button id="btnDe">deutsch</button>
                <button id="btnEn">english</button>
            </div>
        </div>
    </div>

    <div id="mijnPopup" class="popup-overlay">
        <div class="popup-box">
            <h2>kiez je taal</h2>
            <h2>Wählen Sie Ihre Sprache</h2>
            <h2>choose your language</h2>
            <button id="popUpNl" onclick="sluitPopup()" >
                <img class="taal-pop-up" src="../images/nederland.png" alt="nederland">
            </button>
            <button id="popUpDe" onclick="sluitPopup()">
                <img class="taal-pop-up" src="../images/duitsland.png" alt="duitsland">
            </button>
            <button id="popUpEn" onclick="sluitPopup()">
                <img class="taal-pop-up" src="../images/engels.png" alt="engels">
            </button>
        </div>
</div>
    <table>
        <h1>accounts en locaties</h1>
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

    <table>
        <h1>locaties</h1>
            <?php
                foreach ($locations as $a) {?>
                    <tr>
                        <th>locatie id</th>
                        <th>locatie naam</th>
                    </tr>
                    <tr>
                        <td><?= $a['locationid'] ?></td>
                        <td><?= $a['location'] ?> </td>
                    </tr>
            <?php } ?>
    </table>
    <a href="location_add.php"> locatie toevoegen</a>

</body>
</html>