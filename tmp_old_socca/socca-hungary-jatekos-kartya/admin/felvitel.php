<?php
//Űrlap feldolgozása
//a kitoltott inputokat elkuldes (postolás) után,ha létezik, akkor kiirja
if (isset($_POST['rendben'])) {
    print_r($_POST);
    //javitasok, hogy pl. ne vigyenek be szóközöket,
    //crosside scripting pl. <script>alert('Hello')</script> támadási forma, amikor gyakorlatilag bejuttatok valamit a rendszerbe
    //ez egy támadható bevitelmezőt eredményez
    /*
    $nev    = $_POST['nev'];
    $cegnev = $_POST['cegnev'];
    $mobil  = $_POST['mobil'];
    $email  = $_POST['email'];
    */

    //trim() egy karakterlánc függvény, a szövegelőtt és után lévő whiteSpace karakterek (tab, szóköz, enter) levágja
    //van még r_trim() és l_trim()
    //strtolower() kis betűkre alakit strtoupper() nagybetűkre alakít
    //ucwords() a kezdo betuket nagyra alakítja
    //ucfirst() a szoveg elsobetujét alakítja nagy betűvé
    //strip_tags a tiltani lehet karaktereket (pl. <, !, +. nbs;, html entitások), és meglehet admni azokat is mit engedélyezek
    $name    = strip_tags(ucwords(strtolower(trim($_POST['name']))));
    $registration_number = strip_tags(trim($_POST['registration_number']));
    $validity_date  = strip_tags(trim($_POST['validity_date']));
    $status  = strip_tags(strtolower(trim($_POST['status'])));

    /*ez lefut az összes post elemen
    $_POST = array_map('trim', $_POST);
    */

    //változók tísztitása

    if (empty($name))
        $hibak[] = "Nem adtál meg nevet!";
    //strlen string hossz
    elseif (strlen($name) < 5)
        $hibak[] = "Rossz nevet adtál!";

   /* if (!empty($mobil) && strlen($mobil) < 9status)
        $hibak[] = "Rossz mobil számot adtál meg!";
*/
    //a filter_var megvizsgálja az email-t és a php beépített szintaktikai ellenőrzése FILTER_VALIDATE_EMAIL
    /*if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL))
        $hibak[] = "Rossz e-mail címet adtál meg!";*/
    //Hibaüzenetek összeállítása
    if (isset($hibak)) {
        $kimenet = "<ul>\n";
        foreach ($hibak as $hiba) {
            $kimenet .= "<li>{$hiba}</li>\n";
        }
        $kimenet .= "</ul>\n";
    } else {
        //adatbazisba betöltés és felvitel
        require("./kapcsolat.php");
        $sql = "INSERT INTO jatekos_adatok
        (name, registration_number, validity_date, status)
        VALUES 
        ('{$name}', '{$registration_number}', '{$validity_date}', '{$status}');";
        mysqli_query($dbconn, $sql);
        header("Location: lista.php");
    }
}

?>
<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Névjegykártyák</title>
    <link rel="stylesheet" href="stilus.css">

</head>

<body>
    <h1>Névjegykártyák</h1>
    <!--ha ures az action akkor magat ujrahivja es elorol sorrol sorra ujra ertelmezi a bongeszo-->
    <form method="post" action="">
        <?php if (isset($kimenet)) print $kimenet; ?>
        <p>
            <label for="name">Név*: </label><br>
            <!-- required kötelezően kéri hogy tölsd ki amezőt-->
            <input type="text" id="name" name="name" value="<?php if (isset($name)) print $name; ?>">
        </p>
        <p>
            <label for="registration_number">Sorszám: </label><br>
            <input type="text" id="registration_number" name="registration_number" value="<?php if (isset($registration_number)) print $registration_number; ?>">
        </p>
        <p>
            <label for="validity_date">Érvényesség: </label><br>
            <input type="tel" id="validity_date" name="validity_date" value="<?php if (isset($validity_date)) print $validity_date; ?>">
        </p>
        <p>
            <label for="status">Státusz: </label><br>
            <input type="status" id="status" name="status" value="<?php if (isset($status)) print $status; ?>">
        </p>
        <p><em>A *-gal jelölt mezők kitöltése kötelező!</em></p>
        <input type="submit" id="rendben" name="rendben" value="Rendben">
        <!--a kezdeti üres állapotra állítja vissza az ürlapot-->
        <input type="reset" value="Mégse">
        <p><a href="lista.php">Vissza a névjegyekhez</a></p>
    </form>
</body>

</html>