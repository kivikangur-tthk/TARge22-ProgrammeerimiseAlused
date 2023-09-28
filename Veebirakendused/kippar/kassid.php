<?php
require($_SERVER["DOCUMENT_ROOT"]."/../config.php");
global $yhendus;

$kask = $yhendus->prepare("SELECT id, nimi, toon FROM koerad");
$kask->bind_result($id,$nimi,$toon);
$kask->execute();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minu lemmik koerad</title>
</head>
<body>
    <h1>Koerad</h1>
    <?php
    while($kask->fetch()) {
        echo "<h2 style=\"color:".htmlspecialchars($toon)."\">".htmlspecialchars($nimi)."</h2>";
    }
    ?>
</body>
</html>
<?php
$yhendus->close();