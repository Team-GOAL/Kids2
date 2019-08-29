<?php

require 'db-setup.php';
require 'iteration1 preference sql.php';

//TODO check how to receive Ajax call from the client
global $sql;
//TODO
// global $tableName="";

global $sql;
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

// if all preference attributes are set:
// find sports activity by age, gender, team/individual, indoor/outdoor
if(!empty($_POST['teamIndividual']) && !empty($_POST['indoorOutdoor'])){
    if($_POST['teamIndividual']==="team" && ($_POST['indoorOutdoor']==="indoor")){ // preference of team and indoor
        $gender = $_POST['gender'];
        $age = $_POST['age'];
        $sql =listByAgeGenderTeamIndoor($age, $gender , $age, $dbName, $tableName);
    }
    if($_POST['teamIndividual']==="team" && ($_POST['indoorOutdoor']==="outdoor")){ // preference of team and outdoor
        $sql =listByAgeGenderTeamOutdoor($_POST['age'], $_POST['gender'],$dbName, $tableName);
    }
    if($_POST['teamIndividual']==="individual" && ($_POST['indoorOutdoor']==="indoor")){ // preference of individual and indoor
        $sql =listByAgeGenderIndividualIndoor($_POST['age'], $_POST['gender'],   $dbName, $tableName);
    }
    if($_POST['teamIndividual']==="individual" && ($_POST['indoorOutdoor']==="outdoor")){ // preference of individual and outdoor
        $sql =listByAgeGenderIndividualOutdoor($_POST['age'], $_POST['gender'],  $dbName, $tableName);
    }
}
// if preference of age, gender, team/individual are set
//find sports activity by age, gender, team/individual
elseif(!empty($_POST['teamIndividual'])){
    if($_POST['teamIndividual']==="team"){ // preference of team
        $sql =listByAgeGenderTeam($_POST['age'], $_POST['gender'], $dbName, $tableName);
    }
    if($_POST['teamIndividual']==="individual"){ // preference of team
        $sql =listByAgeGenderIndividual($_POST['age'], $_POST['gender'], $dbName, $tableName);
    }
}
// if preference of age, gender, indoor/outdoor are set,
//find sports activity by age, gender, indoor/outdoor
elseif(!empty($_POST['indoorOutdoor'])){
    if($_POST['indoorOutdoor']==="indoor"){ // preference of indoor
        $sql = listByAgeGenderIndoor($_POST['age'], $_POST['gender'],$dbName, $tableName);
    }
    if($_POST['indoorOutdoor']==="outdoor") { // preference of outdoor
        $sql = listByAgeGenderOutdoor($_POST['age'], $_POST['gender'], $dbName, $tableName);
    }
}
// if preference of age, gender are set, find sports activity by age and gender.
else{
    $sql = listByAgeGender($_POST['age'], $_POST['gender'], $dbName, $tableName);
}

// Create an empty array to store the query results.

$stmt = $pdo->prepare($sql);
$stmt>execute();
$result = $stmt->fetchAll(\PDO::FETCH_ASSOC);

/* send a JSON encoded array to client */

echo json_encode($result );

} catch (PDOException $e) {
    echo 'Failed to connect：' . $e->getMessage();}


?>