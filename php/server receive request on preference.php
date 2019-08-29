<?php

require 'azr-db-setup.php';
require 'iteration1 preference sql.php';

//TODO check how to receive Ajax call from the client
global $sql;
//TODO
$tableName = "dbo.sport_checklist_table_updated";//
$_GET['team'] = "team";
$_GET['indoor']="indoor";
$_GET['age'] = "7";
$_GET['gender'] = "female";


// if all preference attributes are set:
// find sports activity by age, gender, team/individual, indoor/outdoor
if(isset($_GET['team']) && isset($_GET['indoor'])){
    if($_GET['team']==="team" && ($_GET['indoor']==="indoor")){ // preference of team and indoor
		echo "1";
        $sql =listByAgeGenderTeamIndoor($_GET['age'], $_GET['gender'], $_GET['team'], $_GET['indoor'],$dbName, $tableName);
		echo $sql;
	}
    if($_GET['team']==="team" && ($_GET['indoor']==="outdoor")){ // preference of team and outdoor
	echo "1.1";
        $sql =listByAgeGenderTeamOutdoor($_GET['age'], $_GET['gender'], $_GET['team'], $_GET['indoor'], $dbName, $tableName);
    }
    if($_GET['team']==="individual" && ($_GET['indoor']==="indoor")){ // preference of individual and indoor
	echo "1.2";
        $sql =listByAgeGenderIndividualIndoor($_GET['age'], $_GET['gender'],  $_GET['team'],  $_GET['indoor'], $dbName, $tableName);
    }
    if($_GET['team']==="individual" && ($_GET['indoor']==="outdoor")){ // preference of individual and outdoor
	echo "1.3";
        $sql =listByAgeGenderIndividualOutdoor($_GET['age'], $_GET['gender'],  $_GET['team'], $_GET['indoor'], $dbName, $tableName);
    }
}
// if preference of age, gender, team/individual are set
//find sports activity by age, gender, team/individual
elseif(isset($_GET['team'])){
    if($_GET['team']==="team"){ // preference of team
	echo "2.1";
        $sql =listByAgeGenderTeam($_GET['age'], $_GET['gender'], $_GET['team'], $dbName, $tableName);
    }
    if($_GET['team']==="individual"){ // preference of team
	echo "2.2";
        $sql =listByAgeGenderIndividual($_GET['age'], $_GET['gender'], $_GET['team'], $dbName, $tableName);
    }
}
// if preference of age, gender, indoor/outdoor are set,
//find sports activity by age, gender, indoor/outdoor
elseif(isset($_GET['indoor'])){
    if($_GET['indoor']==="indoor"){ // preference of indoor
	echo "3.1";
        $sql = listByAgeGenderIndoor($_GET['age'], $_GET['gender'],$_GET['indoor'], $dbName, $tableName);
    }
    if($_GET['indoor']==="outdoor") { // preference of outdoor
	echo "3.2";
        $sql = listByAgeGenderOutdoor($_GET['age'], $_GET['gender'],$_GET['indoor'], $dbName, $tableName);
    }
}
// if preference of age, gender are set, find sports activity by age and gender.
else{
	echo "3.3";
    $sql = listByAgeGender($_GET['age'], $_GET['gender'], $dbName, $tableName);
}

// Create an empty array to store the query results.
global $result_array;
$result_array= array();
$stmt = $pdo->query($sql);
while ($row = $stmt->fetch()) {
    $temp_array['activity'] = $row['SportsPlayed'];
    $result_array = array_merge($temp_array, $result_array);
}

/* send a JSON encded array to client */
echo json_encode($result_array);

?>