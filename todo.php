<?php
include("db.php");
$query = "SELECT * FROM task ORDER BY id DESC LIMIT 0,5";
$result_tasks = mysqli_query($conn, $query);
$rows = array();

if(mysqli_num_rows($result_tasks) > 0) {
    while($r = mysqli_fetch_assoc($result_tasks)) {
        array_push($rows, $r);
    }

print json_encode($rows);
} else {
    echo "vacio";
}
mysqli_close($conn)
?>