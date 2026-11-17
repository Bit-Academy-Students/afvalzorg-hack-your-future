<?php

session_start();
unset($_SESSION['loggedInWerknemer']);
unset($_SESSION['loggedInChauffeur']);
unset($_SESSION['loggedInLeverancier']);
unset($_SESSION['loggedInWerkgever']);
header("Location: login.php");

?>