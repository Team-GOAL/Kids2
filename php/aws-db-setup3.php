<?php
header("Content-Type=text/html;charset=utf8");
$dbType   = 'mysql';
$host     = 'database-1.casaic7l2vnl.ap-southeast-2.rds.amazonaws.com';
$dbName   = 'kidsdatabase';
$userName = 'admin';
$pwd      = '!Raisingkids123';//33333333

$dsn = "$dbType:host=$host;dbname=$dbName";
try {
$pdo = new PDO($dsn, $userName, $pwd);
echo 'Successfully connected to the database.';
} catch (PDOException $e) {
echo 'Failed to connect：' . $e->getMessage();}

?>
