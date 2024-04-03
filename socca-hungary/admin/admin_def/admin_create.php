<?php
/* Lapvédelem */
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: ../login.php");
} ?><?php
    include("../templates/admin_header.php");
    ?>
<div class="create-form w-100 mx-auto p-4" style="max-width:700px;">
    <form action="admin_process.php" method="post">
        <div class="form-field mb-4">
            <label for="email"><strong>Új Adminisztrátor E-mail címe: </strong></label>
            <input type="text" class="form-control" name="email" id="" placeholder="Add meg az E-mail címedet:">
        </div>
        <div class="form-field mb-4">
            <label for="passwrd"><strong>Új Adminisztrátor Jelszava: </strong></label>
            <input type="password" name="passwrd" class="form-control" id="" placeholder="Add meg a jelszavadat:">
        </div>

        <input type="hidden" name="date" value="<?php echo date("Y-m-d H-i-d"); ?>">

        <div class="form-field">
            <input type="submit" class="btn btn-primary" value="Regisztrálás" name="submit_a">
        </div>
    </form>
</div>
<?php
include("../templates/footer.php");
?>