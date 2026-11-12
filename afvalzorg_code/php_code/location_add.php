<?php


if (isset($_POST['confirm'])) {
    $safety_instruction = $_POST['safety_instr'];
    $name = $_POST['location_name'];
}

?>




<form method="post">
    <label for="location_name"> locatie</label>
    <input type="text" name="location_name" placeholder="Ex: Zaandam">
    <label for="safety_instr"> veiligheids instructie</label>
    <input type="text" name="safety_instr">
    <input type="submit" name="confirm" value="toevoegen">
</form>

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


</body>
</html>