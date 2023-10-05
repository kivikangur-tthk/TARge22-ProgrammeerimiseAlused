<?php
require($_SERVER["DOCUMENT_ROOT"]."/../config.php");
global $yhendus;

if(isSet($_REQUEST["uue_kommentaari_id"])){
    if(trim($_REQUEST["uus_kommentaar"])!=""){
        $kask=$yhendus->prepare("UPDATE laulud SET kommentaarid=CONCAT(kommentaarid, ?) WHERE id=?");
        $kommentaarilisa="\n".$_REQUEST["uus_kommentaar"]."\nLisatud:".date(DATE_RFC822)."\n";
        $kask->bind_param("si", $kommentaarilisa, $_REQUEST["uue_kommentaari_id"]);
        $kask->execute();        
    }
    header("Location: $_SERVER[PHP_SELF]");
    $yhendus->close();
    exit();
}
?>
    <!doctype html>
    <html>
<head>
<title>Laulud</title>
</head>
<body>
<h1>Laulud</h1>
<table>
<?php
$kask=$yhendus->prepare(
"SELECT id, pealkiri, kommentaarid FROM laulud");
$kask->bind_result($id, $pealkiri, $kommentaarid);
$kask->execute();
while($kask->fetch()){
$pealkiri=htmlspecialchars($pealkiri);
$kommentaarid=nl2br(htmlspecialchars($kommentaarid));
echo "<tr>
<td>$pealkiri</td>
<td>$kommentaarid</td>
<td>
<form action='?' method='post'>
<input type='hidden' name='uue_kommentaari_id' value='$id' />
<input type='text' name='uus_kommentaar' required />
<input type='submit' value='Lisa kommentaar' />
</form>
</td>
</tr>";
}
?>
</table>
</body>
</html>
<?php
$yhendus->close();
?>