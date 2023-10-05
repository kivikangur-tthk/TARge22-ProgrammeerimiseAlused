<?php
require($_SERVER["DOCUMENT_ROOT"]."/../config.php");
global $yhendus;

if(isSet($_REQUEST["peitmise_id"])){
    $kask=$yhendus->prepare("UPDATE laulud SET avalik=0 WHERE id=?");
    $kask->bind_param("i", $_REQUEST["peitmise_id"]);
    $kask->execute();
}
if(isSet($_REQUEST["avamise_id"])){
    $kask=$yhendus->prepare("UPDATE laulud SET avalik=1 WHERE id=?");    
    $kask->bind_param("i", $_REQUEST["avamise_id"]);    
    $kask->execute();    
}
if(isSet($_REQUEST["muudaKorraga"])){
    $olek = intval($_REQUEST["muudaKorraga"]) % 2;
    $kask=$yhendus->prepare("UPDATE laulud SET avalik=? WHERE punktid=0");
    $kask->bind_param("i", $olek); 
    $kask->execute();    
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
$kask=$yhendus->prepare("SELECT id, pealkiri, avalik FROM laulud");
$kask->bind_result($id, $pealkiri, $avalik);
$kask->execute();
while($kask->fetch()){
$pealkiri=htmlspecialchars($pealkiri);
$avamistekst="Ava";
$avamisparam="avamise_id";
$avamisseisund="Peidetud";
if($avalik==1){
    $avamistekst="Peida";
    $avamisparam="peitmise_id";
    $avamisseisund="Avatud";
}
echo "<tr>
<td>$pealkiri</td>
<td>$avamisseisund</td>
<td><a href='?$avamisparam=$id'>$avamistekst</a></td>
</tr>";
}
?>
</table>
<a href="?muudaKorraga=0">Peida kõik punktideta laulud</a><br>
<a href="?muudaKorraga=1">Kuva kõik punktideta laulud</a>
</body>
</html>
<?php
$yhendus->close();
?>