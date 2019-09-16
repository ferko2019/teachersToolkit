<?php
$subject = $_POST["subject"];
$year = $_POST["year"];
$class = $_POST["class"];
$task = $_POST["task"];
$description = $_POST["description"];

include "databaseConfig.php";

$link = mysqli_connect("localhost", "root", "", "teacherstoolkit");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$sql = "INSERT INTO homeworkdiary (subject, description, task, class, year, finished) VALUES ('$subject', '$description', '$task', '$class', '$year', 'false')";

if ($link->query($sql) === TRUE) {
	echo "New record created successfully";
} else {
	echo "Error: " . $sql . "<br>" . $link->error;
}

mysqli_close($link);
?>