<?php

require 'aws-db-setup3.php';

///Input case 3:  user inputs Age and gender
function listByAgeGender(string $age, string $gender, string $dbName, string $tableName){
    $age = (int)$age; // convert input to int
    $sql = "select * from $dbName.$tableName where Min_Age <= '$age' and Max_Age >= '$age' and Gender = '$gender' order by Preference_Rank";
    return $sql;
}

///Input case 6:  user inputs by age, gender, team
function listByAgeGenderTeam(string $age, string $gender, string $team, string $dbName, string $tableName){
    $age = (int)$age;  // convert input to int
	$team = 1;
	$sql = "select * from $dbName.$tableName where Min_Age <= '$age' and Max_Age >= '$age' and Gender = '$gender' and Team_Sport = '$team' order by Preference_Rank";
   return $sql;
}

///Input case 7:  user inputs by age, gender, individual
function listByAgeGenderIndividual(string $age, string $gender, string $individual, string $dbName, string $tableName){
    $age = (int)$age; // convert input ot int
	$individual = 1;
	$sql = "select * from $dbName.$tableName where Min_Age <= '$age' and Max_Age >= '$age' and Gender = '$gender' and Individual_Sport = '$individual' order by Preference_Rank";
   return $sql;
}

///Input case 4:  user inputs by Age, gender, indoor
function listByAgeGenderIndoor(string $age, string $gender, string $indoor, string $dbName, string $tableName){
    $age = (int)$age; // convert input ot int
	$indoor = 1;	
	$sql = "select * from $dbName.$tableName where Min_Age <= '$age' and Max_Age >= '$age' and Gender = '$gender' and Indoor = '$indoor' order by Preference_Rank";
   return $sql;
}
///Input case 5:  user inputs by age, gender, outdoor
function listByAgeGenderOutdoor(string $age, string $gender, string $outdoor, string $dbName, string $tableName){
    $age = (int)$age; // convert input ot int
	$outdoor = 1;
    $sql = "select * from $dbName.$tableName where Min_Age <= '$age' and Max_Age >= '$age' and Gender = '$gender' and Outdoor = '$outdoor' order by Preference_Rank";
    return $sql;
}

///Input case 8:  user inputs by age, gender, outdoor, individual
function listByAgeGenderIndividualOutdoor(string $age, string $gender, string $outdoor, string $individual, string $dbName, string $tableName){
    $age = (int)$age; // convert input ot int
	$individual = 1;
	$outdoor = 1;
    $sql = "select * from $dbName.$tableName where Min_Age <= '$age' and Max_Age >= '$age' and Gender = '$gender' and Individual_Sport = '$individual' and Outdoor = '$outdoor' order by Preference_Rank";
    return $sql;
}
///Input case 9:  user inputs by age, gender, outdoor, team
function listByAgeGenderTeamOutdoor(string $age, string $gender, string $outdoor, string $team, string $dbName, string $tableName){
    $age = (int)$age; // convert input ot int
	$team = 1;
	$outdoor = 1;
	$sql = "select * from $dbName.$tableName where Min_Age <= '$age' and Max_Age >= '$age' and Gender = '$gender' and Team_Sport = '$team' and Outdoor = '$outdoor' order by Preference_Rank";
    return $sql;
}

///Input case 10:  user inputs by age, gender, indoor, team
function listByAgeGenderTeamIndoor(string $age, string $gender, string $indoor, string $team, string $dbName, string $tableName){
    $age = (int)$age; // convert input ot int
	$team = 1;
	$indoor = 1;
    $sql = "select * from $dbName.$tableName where Min_Age <= '$age' and Max_Age >= '$age' and Gender = '$gender' and Indoor = '$indoor' and  Team_Sport = '$team' order by Preference_Rank";
    return $sql;
}

///Input case 11:  user inputs by age, gender, indoor, individual
function listByAgeGenderIndividualIndoor(string $age, string $gender, string $indoor, string $individual, string $dbName, string $tableName){
    $age = (int)$age; // convert input ot int
	$individual = 1;
	$indoor = 1;
    $sql = "select * from $dbName.$tableName where Min_Age <= '$age' and Max_Age >= '$age' and Gender = '$gender'  and Indoor = '$indoor' and Individual_Sport = '$individual' order by Preference_Rank";
    return $sql;
}


?>