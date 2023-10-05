<?php
require($_SERVER["DOCUMENT_ROOT"]."/../config.php");
global $yhendus;
if(isSet($_REQUEST["healaulu_id"])){
$kask=$yhendus->prepare("UPDATE laulud SET punktid=punktid+1 WHERE id=?");
$kask->bind_param("i", $_REQUEST["healaulu_id"]);
$kask->execute();
}
if(isSet($_REQUEST["uue_kommentaari_id"])){
$kask=$yhendus->prepare(
"UPDATE laulud SET kommentaarid=CONCAT(kommentaarid, ?) WHERE id=?");
$kommentaarilisa="\n".$_REQUEST["uus_kommentaar"]."\nLisatud:".date(DATE_RFC822)."\n";
$kask->bind_param("si",
$kommentaarilisa, $_REQUEST["uue_kommentaari_id"]);
$kask->execute();
header("Location: $_SERVER[PHP_SELF]?id=$_REQUEST[uue_kommentaari_id]");
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
<?php
if(isSet($_REQUEST["id"])){
$kask=$yhendus->prepare(
"SELECT id, pealkiri, kommentaarid, punktid, lisamisaeg
FROM laulud WHERE id=?");
$kask->bind_param("i", $_REQUEST["id"]);
$kask->bind_result(
$id, $pealkiri, $kommentaarid, $punktid, $lisamisaeg);
$kask->execute();
if($kask->fetch()){
$pealkiri=htmlspecialchars($pealkiri);
$kommentaarid=nl2br(htmlspecialchars($kommentaarid));
echo "
<h2>$pealkiri</h2>
<dl>
<dt>Punkte:</dt>
<dd>$punktid</dd>
<dt>Lisatud:</dt>
<dd>$lisamisaeg</dd>
<dt>Kommentaarid:</dt>
<dd>$kommentaarid</dd>
</dl>
<a href='?healaulu_id=$id'>Lisa punkt</a><br />
<form action='?'>
<input type='hidden'
name='uue_kommentaari_id' value='$id' />
<input type='text' name='uus_kommentaar' />
<input type='submit' value='Lisa kommentaar' />
</form>
";
$kask->close();
}
}
?>
<h1>Laulud</h1>
<table>
<?php
$kask=$yhendus->prepare(
"SELECT id, pealkiri, punktid FROM laulud WHERE avalik=1");
$kask->bind_result($id, $pealkiri, $punktid);
$kask->execute();
while($kask->fetch()){
$pealkiri=htmlspecialchars($pealkiri);
echo "<tr>
<td><a href='?id=$id'>$pealkiri</a></td>
<td>$punktid</td>
</tr>";
}
?>
</table>
</body>
</html>
<?php
$yhendus->close();
?>