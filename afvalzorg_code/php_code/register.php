<?php   

require_once("../database/db.php");

function test_input($data)
{
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

$nameError = "";
$lastnameError = "";
$emailError = "";
$phoneError = "";
$persoonError = "";
$wachtwoordError = "";
$bevestigWachtwoordError = "";
$onjuisteWachtwoordError = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (empty($_POST['voornaam'])) {
        $nameError = "Naam kan niet leeg zijn!";
    } else {
        $voornaam = test_input($_POST['voornaam']);
        if (!preg_match("/^[a-zA-Z-']*$/",$voornaam)) {
            $nameError="Alleen letters toegestaan!";
        }
    }

    if (empty($_POST['achternaam'])) {
        $lastnameError = "Achternaam kan niet leeg zijn!";
    } else {
        $achternaam = test_input($_POST['achternaam']);
        if (!preg_match("/^[a-zA-Z-']*$/",$achternaam)) {
            $lastnameError="Alleen letters toegestaan!";
        }
    }

    if (empty($_POST["email"])) {
    $emailError = "Email kan niet leeg zijn!";
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailError = "Invalide email!";
        }
    }

    if (empty($_POST['telefoonnummer'])) {
        $phoneError = "Telefoonnummer kan niet leeg zijn!";
    } else {
        $telefoonnummer = test_input($_POST['telefoonnummer']);

        $pattern = '/^\+[1-9][0-9]{3,14}$/';

        if (!preg_match($pattern, $telefoonnummer)) {
            $phoneError = "Invalide telefoonnummer!";
        }
    }

    if (empty($_POST["persoon"])) {
        $persoonError = "kan niet leeg zijn!";
    } else {
        $persoon = test_input($_POST["persoon"]);
    }

    if (empty($_POST["password"])) {
        $wachtwoordError = "Wachtwoord kan niet leeg zijn!";
    } else {
        $wachtwoord = test_input($_POST["password"]);
    }

    if (empty($_POST["passwordconfirm"])) {
        $bevestigWachtwoordError = "Wachtwoord kan niet leeg zijn!";
    } else {
        $bevestigwachtwoord = test_input($_POST["passwordconfirm"]);
    }

    if (!empty($wachtwoord) && !empty($bevestigwachtwoord)) {
        if ($wachtwoord != $bevestigwachtwoord) {
            $onjuisteWachtwoordError = "Wachtwoorden zijn niet hetzelfde!";
        } else {
            $hashed_password = password_hash($wachtwoord, PASSWORD_DEFAULT);
        }
    }

    if (
        empty($nameError) &&
        empty($lastnameError) &&
        empty($emailError) &&
        empty($phoneError) &&
        empty($persoonError)&&
        empty($wachtwoordError)&&
        empty($bevestigWachtwoordError)&&
        empty($onjuisteWachtwoordError)
    ) {
        echo "validates";
        $statement = $pdo->prepare("INSERT INTO users (voornaam, achternaam, E_MAIL, telefoonnummer, persoon, password) VALUES (:voornaam, :achternaam, :email, :telefoonnummer, :persoon, :password)");
        $statement->bindParam(':voornaam', $voornaam);
        $statement->bindParam(':achternaam', $achternaam);
        $statement->bindParam(':email', $email);
        $statement->bindParam(':telefoonnummer', $telefoonnummer);
        $statement->bindParam(':persoon', $persoon);
        $statement->bindParam(':password', $hashed_password);
        $statement->execute();

        header("Location: login.php");
        exit();
    }
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Register</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <h1>Registreren</h1>
        <form method="POST">
            Voornaam <input type="text" name="voornaam" id="voornaam">
            <span class="error">* <?php echo $nameError;?></span><br><br>
            Achternaam <input type="text" name="achternaam" id="achternaam">
            <span class="error">* <?php echo $lastnameError;?></span><br><br>
            e-mail <input type="email" name="email" id="email">
            <span class="error">* <?php echo $emailError;?></span><br><br>
            telefoonnummer <input type="text" name="telefoonnummer" id="telefoonnummer" maxlength="16">
            <span class="error">* <?php echo $phoneError;?></span><br><br>
            Wie bent u? <br>
            Werknemer <input type="radio" id="werknemer" name="persoon" value="werknemer"><br>
            Leverancier <input type="radio" id="leverancier" name="persoon" value="leverancier"><br>
            Chauffeur <input type="radio" id="chauffeur" name="persoon" value="chauffeur"><br>
            Werkgever <input type="radio" id="chauffeur" name="persoon" value="werkgever">
            <span class="error">* <?php echo $persoonError;?></span><br><br>
            Wachtwoord <input type="password" id="password" name="password" maxlength="50" minlength="8">
            <span class="error">* <?php echo $wachtwoordError;?></span><br><br>
            Wachtwoord bevestigen <input type="password" id="passwordconfirm" name="passwordconfirm" maxlength="50" minlength="8">
            <span class="error">* <?php echo $bevestigWachtwoordError;?></span><br><br>
            <span class="error">* <?php echo $onjuisteWachtwoordError;?></span><br><br>
            <input type="submit" value="Registreren">
        </form>
    </body>
</html>