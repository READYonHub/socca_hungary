<?php
require_once("./kapcsolat.php");

$qr_id              =       "";
$keresett_Jatekos   =       "";   


$sql    =   "SELECT player_id, name, registration_number
             FROM jatekos_adatok 
             /*WHERE name = {%$keresett_Jatekos%}*/
             LIMIT 1
             ";

$eredmeny  =   mysqli_query($dbconn, $sql);

while ($sor = mysqli_fetch_assoc($eredmeny)) {
    
    $qr_id = (string) $sor['player_id'] . '' . str_replace(' ', '',$sor['name']) . '' . $sor['registration_number'];
}
file_put_contents("jatekosToQR.txt", sha1($qr_id));

?>