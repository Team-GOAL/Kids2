<?php

//Add the file to construct the database
require 'aws-db-setup3.php';

//TODO type in your database name below:
//TODO type in your table name below:
$tableName = "dbo.proportion";
$dbName = "database1syd";


//return top 20 suburbs with significant chinese population proporiton in a descending order
$sql = "select * from (select distinct(Suburb),	proportion from $dbName.$tableName where proportion > 0) order by proportion desc LIMIT 5";

?>