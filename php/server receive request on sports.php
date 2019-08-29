<?php

global $sql;
global $arr;
global $pdo;
global $options;

//database information
$dbType = 'mysql';
$host = '127.0.0.1';
$dbName = '33';
$userName = 'root';
$pwd = '33333333';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$dsn = "$dbType:host=$host;dbname=$dbName";
try {
    //Construct the database connection
    $pdo = new PDO($dsn, $userName, $pwd);
    $options = [ //Configure PDO database connection options
        PDO::ATTR_EMULATE_PREPARES => false, // turn off emulation mode for "real" prepared statements
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, //turn on errors in the form of exceptions
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //make the default fetch be an associative array
    ];
    // If both suburb and sports activity have inputs
    if (!empty($_POST['suburb']) && !empty($_POST['sports'])) {//search by suburb and sports activity
        $suburb = $_POST['suburb'];
        $activity = $_POST['sports'];
        //TODO check if the query is wrong?
        $sql = $pdo->prepare("select * from $dbName.sports where $dbName.sports.SuburbTown = :SuburbTown and $dbName.sports.SportsPlayed = :SportsPlayed");
        $sql->execute([':SuburbTown' => $suburb, ':SportsPlayed' => $activity]);
        $arr = $sql->fetchAll(PDO::FETCH_ASSOC);
        // If only suburb has inputs
    } elseif (!empty($_POST['suburb'])) {//search by suburb
        if (isset($_POST['suburb'])){echo("suburb set");}
        $suburb = $_POST['suburb'];
        $sql = $pdo->prepare("select * from $dbName.sports where $dbName.sports.SuburbTown like :SuburbTown");
        $sql->execute([':SuburbTown' => $suburb]);
        $arr = $sql->fetchAll(PDO::FETCH_ASSOC);
        // If only sports activity has inputs
    } elseif (!empty($_POST['sports'])) {//search by activity
        if (isset($_POST['sports'])){echo("sports set");}

      //  echo($_POST['sports'];
        $activity = $_POST['sports'];
        $sql = $pdo->prepare("select * from $dbName.sports where $dbName.sports.SportsPlayed like ?");
        $sql->execute([$activity]);
        $arr = $sql->fetchAll(PDO::FETCH_ASSOC);
    } else {// do nothing

    }
    if (!$arr) exit('We could not found the result.');
    /* send a JSON encded array to client */
    echo json_encode($arr);
    $sql = null;
} catch (PDOException $e) {
    die("No matching results.");
}
?>