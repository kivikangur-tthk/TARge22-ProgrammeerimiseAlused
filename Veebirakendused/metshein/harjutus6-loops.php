<h2>Genereeri</h2>
<h3>Arvud 1-100</h3>
<?php
for ($i=1; $i < 101; $i++) { 
    echo "$i ";
}
?>
<h4>Lisa peale iga 10. arvu reavahetus / iga arvu järele punkt</h4>
<pre>
<?php
for ($i=1; $i < 101; $i++) { 
    echo str_pad("$i. ",5," ",STR_PAD_LEFT);
    if ($i % 10 == 0) {
        echo "\n";
    }
}
?>
</pre>
<hr>    
<h2>Read</h2>
<h3>Koosta tärnidest horisontaalne rida</h3>
<?php
echo str_repeat("*",15);
?>
<h3>Koosta tärnidest vertikaalne rida</h3>
<?php
echo str_repeat("*<br>",15);
?>
<h3>Koosta tärnidest ruut</h3>
<?php 
$size = isset($_REQUEST['size']) ? $_REQUEST['size'] : 5;
?>
<form>
    <label for="size">Sisesta ruudu suurus</label>
    <input id="size" type="number" name="size" value="<?= $size ?>" />
</form>
<span style="font-family:monospace">
<?php
for ($row=1; $row <= $size; $row++) { 
    for ($col=1; $col <= $size; $col++) { 
        echo "* ";
    }
    echo "<br>";
}
?>
</span>
<h2>Kahanev - väljasta paarisarvud 100-1</h2>
<?php 
for ($i=100; $i > 0; $i--) { 
    if($i%2==0) {
        echo "$i ";
    }
}
echo "<br>";
for ($i=100; $i > 0; $i-=2) { 
    echo "$i ";
}
echo "<br>";
echo implode(" ", range(100, 1, -2));
?>
<h3>Kolmega jagunevad</h3>
<?php
echo implode(" ", range(99, 1, -3));
?>
<h2>Massiivid ja tsüklid</h2>
<h3>Tekita tüdrukute ja poiste massiivid (võrdsed)</h3>
<?php
$boys = ["John","Azaan","Regan","Troy","Otis","Evan","Ezra","Johnny","Archie","Raphael"];
//var_dump($boys);
$girls = ["Lucie","Constance","Victoria","Teagan","Hannah","Rose","Maja","Ruth","Sky","Grace"];
//var_dump($girls);
?>
<h3>Väljasta poiste ja tüdrukute paarid erinevatel ridadel
</h3>
<ol>
<?php
for ($i=0; $i < count($boys); $i++) { 
    echo "<li>$boys[$i] and $girls[$i] </li>";
}
?>
</ol>
<h3>BOONUS</h3>
<h4>Tee poiste ja tüdrukute massiividest koopiad</h4>
<?php
$anotherBoys = $boys;
$anotherGirls = $girls;
unset($boys[0]);
var_dump($anotherBoys);
var_dump($boys);
?>
<h4>Tekita suvalistest tüdrukutest ja poistest paarid (nimed ei tohi korduda)</h4>
<?php
$uniqueCouples = [];
$tryCount = 0;
 do {
    $tryCount++;
    $randIndex = random_int(0, count($anotherBoys)-1);
    $randomBoy = $anotherBoys[$randIndex];
    $randIndex = random_int(0, count($anotherBoys)-1);
    $randomGirl = $anotherGirls[$randIndex];
    $randomCouple = "$randomBoy and $randomGirl";
    if(!in_array($randomCouple,$uniqueCouples)){
        $uniqueCouples[$tryCount] = $randomCouple;
    }
}while (count($uniqueCouples)<100);
echo "Kõik paarid said loodud $tryCount. katsega.<br>";
//sort($uniqueCouples);
echo count($uniqueCouples)."<br> ". implode("<br>",$uniqueCouples);
