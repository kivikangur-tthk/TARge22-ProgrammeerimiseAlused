<?php
require($_SERVER["DOCUMENT_ROOT"]."/../config.php");
global $yhendus;

if(isSet($_REQUEST["healaulu_id"])){
    $punktid = isSet($_REQUEST["punktid"]) ? intval($_REQUEST["punktid"]) % 4 : 1;
    $kask=$yhendus->prepare("UPDATE laulud SET punktid=punktid+? WHERE id=?");
    $kask->bind_param("ii", $punktid, $_REQUEST["healaulu_id"]);
    $kask->execute();
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
$kask=$yhendus->prepare("SELECT id, pealkiri, punktid FROM laulud WHERE avalik=1");
$kask->bind_result($id, $pealkiri, $punktid);
$kask->execute();
while($kask->fetch()){
$pealkiri=htmlspecialchars($pealkiri);
echo "<tr>
<td>$pealkiri</td>
<td>$punktid</td>
<td>
    <a href='?healaulu_id=$id'>Lisa punkt</a>
    <a href='?healaulu_id=$id&punktid=2'>Lisa 2 punkti</a>
    <a href='?healaulu_id=$id&punktid=3'>Lisa 3 punkt</a>
</td>
</tr>";
}
?>
</table>
<a href="lisamine.php">Lisa laul</a>
</body>
</html>
<?php
$yhendus->close();
?>