<?php
include("templates/header.php");
?>
<div class="row">
    <div class="col-3 p-4 mt-4">
        <button type="button" class="btn btn-primary">
            <a href="./admin_def/admin_create.php" class="text-light text-decoration-none">Új Adminisztrátor</a>
        </button>
    </div>
    <div class="col-3 p-4 mt-4">
        <button type="button" class="btn btn-warning">
            <a href="./admin_def/admin_manager.php" class="text-light text-decoration-none">Meglévő Adminisztrátorok módosítása</a>
        </button>
    </div>
</div>
<?php
include("templates/footer.php");
?>