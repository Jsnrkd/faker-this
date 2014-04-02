<?php
/*

CLI args order= host user password dbPrefix

Example using faker https://github.com/fzaninotto/Faker

This takes arguments from the command line so that the utility could be used in automation. 

The example changes the name and address of a user in a MySQL table.

Uses MySQLi but can be easily modified to PDO.
*/


$host = $argv[1];
$user = $argv[2];
$password = $argv[3];
$dbPrefix = $argv[4];

// require the Faker autoloader
require_once 'vendor/autoload.php';
$faker = Faker\Factory::create();
$db = new mysqli($host, $user, $password);

if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}

#get database that start with prefix and end with a number
$db_result = $db->query('SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME REGEXP "^'.$dbPrefix.'.*[0-9]$"');

while($row = $db_result->fetch_array(MYSQLI_NUM)){
	$db_name = $row[0];
	echo 'Anonymizing '.$db_name."\n";
	#Adults
	if(!$result = $db->query("SELECT AdultID FROM $db_name.Adult")){
	    die('There was an error running the query [' . $db->error . ']');
	}

	while($row = $result->fetch_assoc()){
	    #echo $row['AdultID'];
	    $fName = $faker->firstName;
	    $lName = $faker->lastName;
	    $streetAddress = $faker->streetAddress;
	    $stmt = $db->prepare(
	    	"UPDATE $db_name.Adult 
	    	SET `first_name` = ?, `last_name` = ? , `Address1` = ?, `email` = '', `latitude` = '', 
	    	`longitude` = ''
	    	WHERE `AdultID` = ?");
	    $stmt->bind_param('sssi', $fName, $lName, $streetAddress, $row['AdultID']);
	    $stmt->execute();
	}
}