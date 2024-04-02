<?php
// Az előző kódból származó SHA-1 hash dekódolása
$hash = file_get_contents("jatekosToQR.txt");

// SHA-1 hash visszafejtése az eredeti QR kód adattá
require_once("./kapcsolat.php");

$sql = "SELECT player_id, name, registration_number
        FROM jatekos_adatok
        WHERE SHA1(CONCAT(player_id, REPLACE(name, ' ', ''), registration_number)) = '{$hash}'
        LIMIT 1";

$eredmeny = mysqli_query($dbconn, $sql);

if (mysqli_num_rows($eredmeny) > 0) {
    // A megfelelő rekord megtalálása
    $sor = mysqli_fetch_assoc($eredmeny);
    $player_id = $sor['player_id'];
    $name = $sor['name'];
    $registration_number = $sor['registration_number'];
    
    // Kiírás vagy további feldolgozás
    echo "plyaer_id: $player_id\n";
    echo "name: $name\n";
    echo "registration_number: $registration_number\n";
} else {
    echo "Nincs találat a megadott hash-hez.";
}
?>
