<?php

session_start();
require_once("../database/db.php");

if (isset($_POST['confirm'])) {
    $safety_instruction = $_POST['safety_instr'];
    $name = $_POST['location_name'];
    $addition = $pdo->prepare('INSERT INTO location (location, safety_instr) VALUES :name, :sfty_instr');
    $addition->bindParam(':name', $name);
    $addition->bindParam(':sfty_instr', $safety_instruction);
    $addition->execute();

    header('location: admin_overview_page.php');
    exit();
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
    <link rel="stylesheet" href="../css_code/admin.css">
</head>
<body>
    <form method="post">
        <label for="location_name"> locatie</label>
        <input type="text" name="location_name" placeholder="Ex: Zaandam">
        <label for="safety_instr"> veiligheids instructie</label>
        <input type="text" name="safety_instr">
        <input type="submit" name="confirm" value="toevoegen">
    </form>
</body>
</html>