
<?php if (isset($_POST["itemId"])) {
    $delete_id = $_POST["itemId"];
    $sql = "DELETE from testhuman where PersonID='$delete_id'";
    $databaseObj->Query($sql);
    echo "<script>window.location.href = '../../';</script>";
} ?>