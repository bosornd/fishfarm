<?php

$host = "localhost";
$user = "root";
$pass = "okhwa1234";
$databaseName = "sensor_db";

$conn = mysqli_connect($host,$user,$pass,$databaseName);

if(mysqli_connect_errno($conn)){
	echo "fail";
}

else {
	$result = mysqli_fetch_array(mysqli_query($conn, "SELECT do1,do2,do3,do4,do5,do6,do7,do8,do9,do10 FROM `current_log`"));

	$number_of_sensor = 10;
	
	for($i=0; $i<$number_of_sensor-1; $i++) {
		echo $result[$i] . " ";
	}
}
mysqli_close($conn)
?>
