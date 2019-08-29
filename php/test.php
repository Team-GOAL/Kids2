
<?php

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
//echo 'Successfully connected to the database.';
} catch (PDOException $e) {
    echo 'Failed to connect：' . $e->getMessage();}

    //$suburb = "Clayton";
    //$activity = $_REQUEST['activity'];
    //TODO check if the query is wrong?
    $sql = $pdo->prepare( "select * from $dbName.preference where preference.SuburbTown = ?");
    $sql -> execute(["Clayton"]);

    try{
    $arr = $sql->fetchAll(PDO::FETCH_ASSOC);
if(!$arr) exit('We could not found the result.');
/* send a JSON encded array to client */
echo json_encode($arr);
$sql = null;}
catch (PDOException $e){
    die("No matching results.");
}

?>