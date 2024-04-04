
<?php
/* Lapvédelem */
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: ../login.php");
} ?><?php
    if (isset($_POST["submit_a"])) {
        include("../../connect.php");

        $email = mysqli_real_escape_string($conn, $_POST["email"]);
        $passwrd = sha1(mysqli_real_escape_string($conn, $_POST["passwrd"]));
        $date = mysqli_real_escape_string($conn, $_POST["date"]);

        $sqlInsert = "INSERT INTO admin_default(date, email, passwrd ) VALUES ('$date','$email', '$passwrd' )";
        if (mysqli_query($conn, $sqlInsert)) {
            session_start();
            $_SESSION["submit_a"] = "Administrator added successfully";
            header("Location:./admin_manager.php");
        } else {
            die("Data is not inserted!");
        }
    }
