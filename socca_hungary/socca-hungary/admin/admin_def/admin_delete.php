<?php
$id = $_GET["id_adm"];
if ($id) {
    include("../../connect.php");

    // Ellenőrizzük, hogy hány adminisztrátor van a rendszerben
    $sqlCountAdmins = "SELECT COUNT(*) AS count FROM admin_default";
    $result = mysqli_query($conn, $sqlCountAdmins);
    $row = mysqli_fetch_assoc($result);
    $countAdmins = $row['count'];

    // Csak akkor törölhető az adminisztrátor, ha több van a rendszerben
    if ($countAdmins > 1) {
        $sqlDelete = "DELETE FROM admin_default WHERE id_adm = $id";
        if (mysqli_query($conn, $sqlDelete)) {
            session_start();
            $_SESSION["delete"] = "Administrator deleted successfully";
            header("Location:admin_manager.php");
        } else {
            die("Something is not right. Data is not deleted");
        }
    } else {
        // Ha csak egy adminisztrátor van, jelenítsük meg a figyelmeztetést
        echo <<<WARNING
        <script type="text/javascript">
            alert("Nem törölheted az EGYETLEN létező adminisztrátort!");
            window.location.href = "admin_manager.php";
        </script>
WARNING;
    }
} else {
    echo "Administrator not found";
}
