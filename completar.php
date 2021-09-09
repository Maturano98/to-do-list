<?php
include("db.php");

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $completed_at = date("Y-m-d H:i:s");
    $status = $_POST['status'];
    $query = "UPDATE task set completed_at = '$completed_at', status = '$status' WHERE id = $id";

    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("Falló");
    }
    header("Location: index.php");
}
?>