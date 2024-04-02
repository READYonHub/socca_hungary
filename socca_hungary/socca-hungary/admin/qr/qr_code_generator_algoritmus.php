<?php

$id = $_GET["player_id"];
if ($id) {
    require_once("../../connect.php");

    $keresett_Jatekos   =       "";


    $sql    =   "SELECT player_id, name, registration_number
             FROM players_data 
             WHERE player_id = {$id}
             LIMIT 1
             ";

    $eredmeny  =   mysqli_query($conn, $sql);

    while ($sor = mysqli_fetch_assoc($eredmeny)) {

        $qr_id = (string) $sor['player_id'] . '' . str_replace(' ', '', $sor['name']) . '' . $sor['registration_number'];
    }
    $fileIn    =   file_put_contents("jatekosToQR.txt", sha1($qr_id));

    $command = "python3 qr_code_generator.py " . escapeshellarg($qr_id);

    // Execute the command and capture the output
    $output = shell_exec($command);

    // Output the result
    echo $output;
}

