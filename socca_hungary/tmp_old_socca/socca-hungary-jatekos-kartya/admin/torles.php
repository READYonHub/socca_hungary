<?php

/*kiirja a rakatintott elem id-jat
print_r($_GET);
Array ( [id] => 11 )*/

if (isset($_GET["player_id"])) {
    require("./kapcsolat.php");
    //csak szamot engedunk be tipuskenyszeritessel, hogy ne kapjunk semmilyen varatlan esemenyt
    $player_id = (int)$_GET["player_id"];
    $sql = "DELETE FROM jatekos_adatok
            WHERE player_id = {$player_id}             
            ";
    mysqli_query($dbconn, $sql);
}
header("Location: lista.php");
