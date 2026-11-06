<?php

session_start();

if (!isset($_SESSION)) {
    header("location: login.php");
    die();
}

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

<body id="body">
    <div class="navbar">
        <a id="navbarbegin">home</a>
        <a href="??">locatie</a>
        <a href="Logout.php">Uitloggen</a>
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


    <h1>welkom: (naam persoon)</h1>
    <p>op mijn website kan je de talen aanpassen</p>

    <footer>medemogelijk gemaakt door mijzelf</footer>
</body>

</html>