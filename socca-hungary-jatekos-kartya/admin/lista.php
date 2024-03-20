<?php
require("./kapcsolat.php"); //ha nincs itt akkor hibat dob és megáll a fordítása

$kifejezes = (isset($_POST['kifejezes'])) ? $_POST['kifejezes'] : "";

$sql = "SELECT *
        FROM jatekos_adatok
        WHERE (
            name LIKE '%{$kifejezes}%'            
        )
        ORDER BY name ASC";

$eredmeny = mysqli_query($dbconn, $sql);

$kimenet = "<table>";

$kimenet .= "
    <tr>    
            <th>Név</th>
            <th>Sorszám</th>
            <th>Érvényesség</th>
            <th>Státusz</th>
            <th>Művelet</th>
    </tr>
";

//táblázat tartalma
while ($sor = mysqli_fetch_assoc($eredmeny)) {

    $kimenet .= "\t<tr>
        <td>{$sor['name']}</td>
        <td>{$sor['registration_number']}</td>
        <td>{$sor['validity_date']}</td>
        <td>{$sor['status']}</td>
        <td><a href=\"torles.php?player_id={$sor['player_id']}\">Törlés</a> | <a href=\"modositas.php?player_id={$sor['player_id']}\">Módosítás</a></td>
    </tr>\n";
}
$kimenet .= "</table>\n";
?>
<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nevjegykartya</title>
    <link rel="stylesheet" href="stilus.css">
</head>

<body>
    <h1>Nevjegykartya</h1>
    <!--ket fajta method van a post es a get, a post lathatatlanul kuldi az adatokat (a http protokol torzseben helyezkedik el)
      a get meg nem (latszik az url-ben is es a fejlecben fog atadodni )
    az action at adja az adott fajnak az adatokat
    mivel ures az action ujra hivja sajat magat es ujra lefut
    -->

    <form method="post" action="">
        <!--beviteli mezo, a search egy kereso mezo ami egyreszt enterrel aktivalhato
        masreszt sematinkukan jelzi, hogy ez keresomezo ez a html5-ben jott be
        azok a bongeszok amik ezt nem ismerik azok text tipusuru butitja vissza es ugyanugy hasznalhato lesz
    -->
        <input type="search" id="kifejezes" name="kifejezes">
    </form>
    <p><a href="felvitel.php">Új névjegy</a></p>
    <?php print $kimenet; ?>
    <p><a href="felvitel.php">Új névjegy</a></p>
</body>

</html>