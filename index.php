<?php include("db.php") ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do list</title>
</head>
<body>
    <center>
    <form action="agregar.php" method="POST">
        <input name="name" type="text" required>
        <input name="agregar" type="submit" value="Add task">
    </form>
    <table style="border: 1px solid black; margin: 20px">
        <tr>
            <th>Name</th>
            <th>Created at</th>
            <th>Completed at</th>
            <th>Status</th>
        </tr>
        <tbody>
            <?php
            $query = "SELECT * FROM task";
            $result_tasks = mysqli_query($conn, $query);
            
            while($row = mysqli_fetch_array($result_tasks)) { ?>
                <tr>
                    <td><?php echo $row['name'] ?></td>
                    <td><?php echo $row['created_at'] ?></td>
                    <td><?php echo $row['completed_at'] ?></td>
                    <td><?php echo $row['status'] ?></td>
                    <?php if ($row['completed_at'] == "0000-00-00 00:00:00") { ?>
                        <td><form action="completar.php?id=<?php echo $row['id']?>" method="POST"><input name="status" type="checkbox" value="COMPLETADO"><input type="submit" value="Validar"></form></td>
                    <?php } ?>
                    <td><form action="borrar.php?id=<?php echo $row['id']?>" method="POST"><input type="submit" value="Borrar"></form></td>
                </tr>
            <?php }
            ?>
        </tbody>
    </table>
    <form action="analytics.php" method="POST">
    <input type="submit" value="Analytics">
    </form>
    <form action="./todo" method="POST">
    <input type="submit" value="To-Do API">
    </form>
    </center>                        
</body>
</html>