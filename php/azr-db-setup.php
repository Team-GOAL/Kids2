<?php
header("Content-Type=text/html;charset=utf8");
$dbType   = 'mssql';
$host     = '5120teamgoal.database.windows.net';
$dbName   = 'db2_teamgoal';
$userName = 'c31_rrc_5120';
$pwd      = '!Raisingkids123';//33333333

$dsn = "$dbType:host=$host;dbname=$dbName";
try {
$pdo = new PDO("sqlsrv:Server=$host  ;Database=$dbName ", "$userName", "$pwd");
echo 'Successfully connected to the database.';
} catch (PDOException $e) {
echo 'Failed to connect：' . $e->getMessage();}

?>
