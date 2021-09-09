<?php
include("db.php");

$desde = date("Y-m-d H:i:s", strtotime("-7 days"));
$hasta = date("Y-m-d H:i:s");
$tareas = 0;
$completadas = 0;

if(isset($_POST['consulta'])) {
    $desde = $_POST['desde'];
    $hasta = $_POST['hasta'];
    $query = "SELECT * FROM task";
    $result_tasks = mysqli_query($conn, $query);
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Analytics</title>
</head>
<body>
    <center>
    <form method="POST">
    De <input name="desde" value="<?php echo $desde?>" type="date" required> a <input name="hasta" value="<?php echo $hasta?>" type="date" required> <input name="consulta" type="submit" value="Filtrar">
    </form>

    <table style="border: 1px solid black; margin: 10px">
        <tr>
            <th>Name</th>
            <th>Created at</th>
            <th>Completed at</th>
        </tr>
        <tbody>
            <?php
            $query = "SELECT * FROM task WHERE created_at BETWEEN '$desde' AND '$hasta'";
            $result_tasks = mysqli_query($conn, $query);
            
            while($row = mysqli_fetch_array($result_tasks)) { 
                $tareas = $tareas + 1;
                if ($row['completed_at'] != "0000-00-00 00:00:00") {
                    $completadas = $completadas + 1;
            } ?>
                <tr>
                    <td><?php echo $row['name'] ?></td>
                    <td><?php echo $row['created_at'] ?></td>
                    <td><?php echo $row['completed_at'] ?></td>
                </tr>
            <?php }
         
            ?>
        </tbody>
    </table>
    <tr>
        <td>Tasks: <?php echo $completadas?> completed / <?php echo $tareas?> created</td>
    </tr>
    <form action="index.php" method="POST">
    <input type="submit" value="Go back to homepage">
    </form>
    </center>
</body>
</html>