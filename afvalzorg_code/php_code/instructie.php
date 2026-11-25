<?php 

session_start();

require_once("../database/db.php");

if (!isset($_SESSION['loggedInWerknemer']) && !isset($_SESSION['loggedInLeverancier']) && !isset($_SESSION['loggedInChauffeur']) && !isset($_SESSION['loggedInWerkgever'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['loggedInWerknemer'] ?? $_SESSION['loggedInLeverancier'] ?? $_SESSION['loggedInChauffeur'] ?? $_SESSION['loggedInWerkgever'];

$getlocation = $pdo->prepare("SELECT location FROM users WHERE user_id = :user_id");
$getlocation->bindParam(':user_id', $user_id);
$getlocation->execute();
$location = $getlocation->fetchColumn();


$locationinstruction = $pdo->prepare("SELECT * FROM locations WHERE location = :location");
$locationinstruction->bindParam(':location', $location);
$locationinstruction->execute();
$instructions = $locationinstruction->fetch();

?>
<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="../js_code/instructie.js" defer></script>
    <link rel="stylesheet" href="../css_code/instructie.css">
</head>

<body id="body">
    <div class="navbar">
    </div>

    <div class="instructie-container">
        <h1>veiligheids instructie</h1>
        <p>druk op de locatie waar u bent en bekijk de veiligheids instructies</p>
    </div>

    <div class="locatie-buttons">
        <button id="locatieButton1">Wieringermeer</button>
        <button id="locatieButton2">Nauerna</button>
        <button id="locatieButton3">Het Groene Schip</button>
        <button id="locatieButton4">De Liede</button>
        <button id="locatieButton5">Zeeasterweg</button>
        <button id="locatieButton6">Geldermalsen</button>
        <button id="locatieButton7">Neer</button>
        <button id="locatieButton8">Brunssum</button>
        <button id="locatieButton9">Belvédère Maastricht</button>
    </div>

    <div id="instructiepopup" class="popup-instructie">
        <div class="popup-box">
            <h2>veiligheids instructie</h2>
            <p><?php echo htmlspecialchars(
                    $instructions['safety_instructions'] ?? 'Geen instructies gevonden voor deze locatie.');
                ?></p>
            <button id="sluit-popup" onclick="window.location.href='incheck.html'">doorgaan</button>
        </div>
    </div>
</body>

</html>