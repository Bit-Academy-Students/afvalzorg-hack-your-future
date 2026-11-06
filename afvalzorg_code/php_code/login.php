<?php

session_start();

require_once("../database/db.php");

$emailError = "";
$passwordError = "";
$loginError = "";
$registerError = "";
$locationError = "";

$statement = $pdo->prepare("SELECT * FROM locations");
$statement->execute();
$locations = $statement->fetchAll();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($_POST['email'])) {
        $emailError = "email kan niet leeg zijn!";
    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $emailError = "Ongeldig emailadres!";
    } else {
        $email = $_POST['email'];
    }

    if (empty($_POST['password'])) {
        $passwordError = "Wachtwoord kan niet leeg zijn!";
    } else {
        $password = $_POST['password'];
    }

    if (empty($_POST['location'])) {
        $locationError = "Kies een locatie!";
    } else {
        $location = $_POST['location'];
    }

    $statement = $pdo->prepare("SELECT * FROM users WHERE E_MAIL = :email");
    $statement->bindParam(':email', $email);
    $statement->execute();
    $user = $statement->fetch();

    if (
        empty($emailError) &&
        empty($passwordError) &&
        empty($loginError)&&
        empty($registerError) &&
        empty($locationError)
    ) {
        if ($user && password_verify($password, $user['password'])) {
            $statement = $pdo->prepare("UPDATE users SET location = :location WHERE userid = :userid");
            $statement->bindParam(':location', $location);
            $statement->bindParam(':userid', $user['userid']);
            $statement->execute();

            if ($user['persoon'] == "werknemer") {
                $_SESSION['loggedInWerknemer'] = $user['userid'];
                header("Location: home.php");
                exit();
            } elseif ($user['persoon'] == "chauffeur") {
                $_SESSION['loggedInChauffeur'] = $user['userid'];
                header("Location: home.php");
                exit();
            } elseif ($user['persoon'] == "leverancier") {
                $_SESSION['loggedInLeverancier'] = $user['userid'];
                header("Location: home.php");
                exit();
            } elseif ($user['persoon'] == "werkgever") {
                $_SESSION['loggedInWerkgever'] = $user['userid'];
                header("Location: home.php");
                exit();            
            } else {
                $registerError = "registreer in de registratie-pagina!";
            }
        } else {
            $loginError = "Onjuiste email of wachtwoord!";
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
    </head>
    <body>
        <h1>Login</h1>
        <div>
            <form method="POST">
                email <input type="email" id="email" name="email">
                <span class="error">* <?php echo $emailError;?></span><br><br>
                password <input type="password" id="password" name="password" maxlength="50" minlength="8">
                Locatie <select name="location" id="location">
                <option value="">Kies een locatie</option>
                <?php foreach ($locations as $location) {?>
                <option value="<?= $location['location'] ?>"><?= $location['location'] ?></option>
                <?php } ?>
                </select>
                <span class="error">* <?php echo $locationError; ?></span>
                <span class="error">* <?php echo $passwordError;?></span><br><br>
                <span class="error">* <?php echo $loginError;?></span><br><br>
                <input type="submit" value="inloggen">
                <span class="error">*<a href="register.php"> <?php echo $registerError;?></a></span><br><br>
            </form>
        </div>
        <p><a href="register.php">Registreren</a></p>
    </body>
</html>