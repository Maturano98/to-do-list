<?php
include("db.php");

if (isset($_POST['agregar'])) {
    $name = $_POST['name'];
    
    $query = "INSERT INTO task(name) VALUES ('$name')";
    $respuesta = mysqli_query($conn, $query);
    if (!$respuesta) {
        die("Falló");
    }
    header("Location: index.php");
}

?>