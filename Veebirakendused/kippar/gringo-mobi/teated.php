<h2>Teated</h2>
<ul>
<?php
$kask=$yhendus->prepare("SELECT id, pealkiri FROM lehed");
$kask->bind_result($id, $pealkiri);
$kask->execute();
while($kask->fetch()){
echo "<li><a href='?page=teated&id=$id'>".
htmlspecialchars($pealkiri)."</a></li>";
}
?>
</ul>
<a href='?page=teated&lisamine=jah'>Lisa ...</a>
</div>
<div id="sisukiht">
<?php
if(isSet($_REQUEST["id"])){
$kask=$yhendus->prepare("SELECT id, pealkiri, sisu FROM lehed
WHERE id=?");
//Kysim2rgi asemele pannakse aadressiribalt tulnud id,
//eeldatakse, et ta on tyybist integer (i).
//(double - d, string - s)
$kask->bind_param("i", $_REQUEST["id"]);
$kask->bind_result($id, $pealkiri, $sisu);
$kask->execute();
if($kask->fetch()){
    echo "<h2>".htmlspecialchars($pealkiri)."</h2>";
    echo htmlspecialchars($sisu);
    echo "<br /><a href='?page=teated&kustutusid=$id'>kustuta</a>";
} else {
    echo "Vigased andmed."; 
}
} else if(isSet($_REQUEST["lisamine"])){
    ?>
    <form method="POST" action='?'>
        <input type="hidden" name="uusleht" value="jah" />
        <h2>Uue teate lisamine</h2>
        <dl>
        <dt><label for="pealkiri">Pealkiri:</label></dt>
        <dd>
        <input id="pealkiri" type="text" name="pealkiri" />
        </dd>
        <dt><label for="sisu">Teate sisu:</label></dt>
        <dd>
        <textarea id="sisu" rows="20" name="sisu"></textarea>
        </dd>
        </dl>
        <input type="submit" value="sisesta">
    </form>
    <?php
    } else {
        echo "Tere tulemast avalehele! Vali men&uuml;&uuml;st sobiv teema.";
    }
?>
</div>
<div id="jalusekiht">
Lehe tegi Kristjan
</div>
</body>
</html>
<?php
$yhendus->close();
?>
