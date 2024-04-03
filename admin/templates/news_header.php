<?php
/* Lapvédelem */
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: ../login.php");
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vezérlőpult</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

    <div class="dashboard d-flex justify-content-between">
        <div class="sidebar bg-dark vh-100">
            <h1 class="bg-primary p-4"><a href="../admin_panel.php" class="text-light text-decoration-none">Vezérlőpult</a></h1>
            <div class="menues p-4">

                <div class="menu mt-5" id="firstMenu">
                    <a href="../news_panel.php" class="text-light text-decoration-none"><strong>Hírek</strong></a>
                </div>

                <div class="menu mt-5">
                    <a href="../logout.php" class="btn btn-info">Logout</a>
                </div>

            </div>
        </div>