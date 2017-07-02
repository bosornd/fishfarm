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
	$result = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `current_log`"));


/*
	echo count($result);
	echo $result[0] . "\n";
	echo $result[1] . "\n";
	echo $result[2] . "\n";
*/

	for($i=0; $i<count($result)/2-1; $i++)
	{
		echo $result[$i] . " ";
	}	


}
mysqli_close($conn)
?>
