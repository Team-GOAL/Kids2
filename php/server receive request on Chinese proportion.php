<?php

//Add the file to construct the database
require 'db-setup.php';

global $pdo;

$dbType   = 'mysql';
$host     = '127.0.0.1';
$dbName   = '33';
$userName = 'root';
$pwd      = '33333333';


$dsn = "$dbType:host=$host;dbname=$dbName";
try {
    $pdo = new PDO($dsn, $userName, $pwd);
    $options = [
        PDO::ATTR_EMULATE_PREPARES   => false, // turn off emulation mode for "real" prepared statements
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, //turn on errors in the form of exceptions
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //make the default fetch be an associative array
    ];

    //TODO fix this query
    //TODO change the table name on Azure
//return top 5 suburbs with significant chinese population proporiton in a descending order
//    $sql = “select * from \(select distinct\(Suburb\), proportion from $dbName.chinese_population where proportion > 0\) order by proportion desc LIMIT 5";
$subQuery = "select distinct(Suburb), proportion from $dbName.chinese_population where proportion > 0";
$sql ="select * from $subQuery order by proportion desc LIMIT 5";

$sql->execute();
$arr = $sql->fetchAll(PDO::FETCH_ASSOC);

    if (!$arr) exit('We could not found the result.');
    /* send a JSON encded array to client */
    echo json_encode($arr);
    $sql = null;
} catch (PDOException $e) {
    echo 'Failed to connect：' . $e->getMessage();}

?>