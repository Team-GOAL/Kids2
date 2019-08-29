<?php

//Add the file to construct the database
require 'azr-db-setup.php';

//TODO type in your database name below:
//TODO type in your table name below:
$tableName = "dbo.mapping_suburbtown_suburb_proportion";
$dbName = "db2_teamgoal";


//return top 20 suburbs with significant chinese population proporiton in a descending order
$sql = "select * from (select distinct(Suburb),	proportion from $dbName.$tableName where proportion > 0) order by proportion desc LIMIT 5";

?>