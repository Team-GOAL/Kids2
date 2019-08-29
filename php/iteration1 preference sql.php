<?php

require 'db-setup.php';

///Input case 3:  user inputs Age and gender
function listByAgeGender(string $age, string $gender, string $dbName, string $tableName){
    $age = (int)$age; // convert input to int
    $sql = "select * from $dbName.$tableName where Min_Age <= '$age' and Max_Age >= '$age' and Gender = '$gender'";
    return $sql;
}

///Input case 6:  user inputs by age, gender, team
function listByAgeGenderTeam(string $age, string $gender, string $dbName, string $tableName){
    $age = (int)$age;  // convert input to int
	$sql = "select * from $dbName.$tableName where Min_Age <= '$age' and Max_Age >= '$age' and Gender = '$gender' and Team_Sport = 1";
   return $sql;
}

///Input case 7:  user inputs by age, gender, individual
function listByAgeGenderIndividual(string $age, string $gender, string $dbName, string $tableName){
    $age = (int)$age; // convert input ot int
	$sql = "select * from $dbName.$tableName where Min_Age <= '$age' and Max_Age >= '$age' and Gender = '$gender' and Individual_Sport = 1";
   return $sql;
}

///Input case 4:  user inputs by Age, gender, indoor
function listByAgeGenderIndoor(string $age, string $gender, string $dbName, string $tableName){
    $age = (int)$age; // convert input ot int
	$sql = "select * from $dbName.$tableName where Min_Age <= '$age' and Max_Age >= '$age' and Gender = '$gender' and Indoor = 1";
   return $sql;
}
///Input case 5:  user inputs by age, gender, outdoor
function listByAgeGenderOutdoor(string $age, string $gender, string $dbName, string $tableName){
    $age = (int)$age; // convert input ot int
    $sql = "select * from $dbName.$tableName where Min_Age <= '$age' and Max_Age >= '$age' and Gender = '$gender' and Outdoor = 1";
    return $sql;
}

///Input case 8:  user inputs by age, gender, outdoor, individual
function listByAgeGenderIndividualOutdoor(string $age, string $gender, string $dbName, string $tableName){
    $age = (int)$age; // convert input ot int
    $sql = "select * from $dbName.$tableName where Min_Age <= '$age' and Max_Age >= '$age' and Gender = '$gender' and Individual_Sport = 1 and Outdoor = 1";
    return $sql;
}
///Input case 9:  user inputs by age, gender, outdoor, team
function listByAgeGenderTeamOutdoor(string $age, string $gender,  string $dbName, string $tableName){
    $age = (int)$age; // convert input ot int
	$sql = "select * from $dbName.$tableName where Min_Age <= '$age' and Max_Age >= '$age' and Gender = '$gender' and Team_Sport = 1 and Outdoor = 1";
    return $sql;
}

///Input case 10:  user inputs by age, gender, indoor, team
function listByAgeGenderTeamIndoor(string $age, string $gender, string $dbName, string $tableName){
    $age = (int)$age; // convert input ot int
    $sql = "select * from $dbName.$tableName where Min_Age <= '$age' and Max_Age >= '$age' and Gender = '$gender' and Indoor = 1 and  Team_Sport = 1";
    return $sql;
}

///Input case 11:  user inputs by age, gender, indoor, individual
function listByAgeGenderIndividualIndoor(string $age, string $gender, string $dbName, string $tableName){
    $age = int($age) // convert input ot int
    $sql = "select * from $dbName.$tableName where Min_Age <= '$age' and Max_Age >= '$age' and Gender = '$gender' Individual_Sport = 1 and Indoor = 1";
    return $sql;
}


?>