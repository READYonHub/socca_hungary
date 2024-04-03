
<?php
/* Lapvédelem */
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: ./admin/login.php");
} ?><?php
    $dbHost = "localhost";
    $dbUser = "root";
    $dbPass = "";
    $dbName = "cms";

    $conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
    if (!$conn) {
        die("Something went wrong. Database is not connected;");
    }
    ?>