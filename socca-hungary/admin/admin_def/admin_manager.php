<?php
/* Lapvédelem */
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: ../login.php");
} ?><?php
    include("../templates/admin_header.php");
    ?>
<div class="posts-list w-100 p-5">
    <?php
    if (isset($_SESSION["create"])) {
    ?>
        <div class="alert alert-success">
            <?php
            echo $_SESSION["create"];
            ?>
        </div>
    <?php
        unset($_SESSION["create"]);
    }
    ?>
    <?php
    if (isset($_SESSION["update"])) {
    ?>
        <div class="alert alert-success">
            <?php
            echo $_SESSION["update"];
            ?>
        </div>
    <?php
        unset($_SESSION["update"]);
    }
    ?>
    <?php
    if (isset($_SESSION["delete"])) {
    ?>
        <div class="alert alert-success">
            <?php
            echo $_SESSION["delete"];
            ?>
        </div>
    <?php
        unset($_SESSION["delete"]);
    }
    ?>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th style="width:15%;">Létrehozás dátuma</th>
                <th style="width:15%;">ID</th>
                <th style="width:45%;">Adminisztrátor</th>
                <th style="width:25%;">Művelet</th>
            </tr>
        </thead>
        <tbody>

            <?php
            include('../../connect.php');
            $sqlSelect = "SELECT id_adm, email, date FROM admin_default";
            $result = mysqli_query($conn, $sqlSelect);
            while ($data = mysqli_fetch_array($result)) {
            ?>
                <tr>
                    <td><?php echo $data["date"] ?></td>
                    <td><?php echo $data["id_adm"] ?></td>
                    <td><?php echo $data["email"] ?></td>
                    <td>

                        <a class="btn btn-danger" href="admin_delete.php?id_adm=<?php echo $data["id_adm"] ?>">Delete</a>
                    </td>
                </tr>
            <?php
            }
            ?>

        </tbody>
    </table>

</div>
<?php
include("../templates/visibility.php");
?>
<?php
include("../templates/footer.php");
?>