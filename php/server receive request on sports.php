<?php
require 'azr-db-setup.php';

global $sql;

if(isset($_GET['suburb']) && isset($_GET['activity'])){//search by suburb and sports activity
    $activty = $_GET['activity'];
    $suburb = $_GET['suburb'];
    $sql = "select * from $dbName.$tableName where SuburbTown = '$suburb' and SportsPlayed = '$activty'";
}
elseif(isset($_GET['suburb'])){//search by suburb
    $suburb = $_GET['suburb'];
    $sql = "select * from $dbName.$tableName where SuburbTown = '$suburb '";
}
else{// search by sports activity
    $activty = $_GET['activity'];
    $sql = "select * from $dbName.$tableName where SportsPlayed = '$activty'";
}

global $result_array;
// Create an empty array to store the query results.
$result_array= array();
$stmt = $pdo->query($sql);
while ($row = $stmt->fetch()) {
    array_push($result_array, $row);
}

/* send a JSON encded array to client */
echo json_encode($result_array);
?>