<?php
session_start();
$kimenet = "";

/* hiba feldolgozása */
if (isset($_POST['login'])) {
    require_once('../connect.php');

    /*$username = $_POST['username'];
   /$password = $_POST['password'];
   if ($username == "admin" && $password == "pass") {
    session_start();
    $_SESSION["user"] = "admin";
    header("Location:admin_panel.php");
   }*/

    $email     =  mysqli_real_escape_string($conn, strip_tags(strtolower(trim($_POST['email']))));
    $passwrd   =  mysqli_real_escape_string($conn, $_POST['passwrd']);

    //változók ellenőrzése
    if (empty($email))
        $hibak[]     =   "Nem adott meg e-mail címet!";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        $hibak[]     =   "Nem megfelelő az e-mail formátum!";
    if (empty($passwrd))
        $hibak       =   "Nem adott meg jelszót!";
    if (!preg_match("/^[a-zA-Z0-9]*$/", $passwrd))
        $hibak[]     =   "A jelszó csak ékezet nélküli betűket és számokat tartalmazhat";
    /* hibák összegyűjtése */
    if (isset($hibak)) {
        $kimenet    .=   "<ul>\n";
        foreach ($hibak as $hiba) {
            $kimenet    .=   " <li>{$hiba}</li>\n";
        }
        $kimenet    .=   "</ul>\n";
    }
    //beléptetés 
    else {
        $sql    =   "SELECT id
                     FROM admin_default
                     WHERE email = '{$email}'
                     AND passwrd = '" . sha1($passwrd) . "'
                     LIMIT 1";
        $result =   mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) == 1) {
            $_SESSION['login']  =   true;
            header("Location: admin_panel.php ");
        } else {
            $kimenet    .=   "<p><em>Helytelen bejelentkezési adatok!</em></p>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5" style="max-width:600px">
        <div class="login-form">
            <form action="login.php" method="post">
                <?php print $kimenet ?>
                <div class="form-field mb-4">
                    <label for="email"><strong>Felhasználónév:</strong></label>
                    <input class="form-control" type="email" name="email" id="" placeholder="Email">
                </div>
                <div class="form-field mb-4">
                    <label for="passwrd"><strong>Jelszó:</strong></label>
                    <input class="form-control" type="password" name="passwrd" id="" placeholder="Password">
                </div>
                <div class="form-field mb-4">
                    <input class="btn btn-primary" type="submit" value="Login" name="login">
                </div>
            </form>
        </div>
    </div>
</body>

</html>