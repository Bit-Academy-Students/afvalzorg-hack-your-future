<?php 

session_start();

require_once("../database/db.php");

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
        <div id="safety_popup" class="popup-overlay">
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
        <div id="instructiepopup" class="popup-instructie">
            <div class="popup-box">
                <h2>veiligheids instructie</h2>
                <p>Lees de instructies zorgvuldig door voordat u verder gaat.</p>
                <button id="sluit-popup" onclick="window.location.href='incheck.html'">doorgaan</button>
            </div>
        </div>
    </div>
    </body>
</html>

