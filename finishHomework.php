<?php
//setup variables
session_start();

$username = $_SESSION["username"];
$password = $_SESSION["password"];
$class = $_SESSION["class"];
$year = $_SESSION["year"];
$subject = $_GET["subject"];
$task = $_GET["task"];
$date = $_GET["date"];
$description = $_GET["description"];

echo $subject . ' ';
echo $task . ' ';
echo $date . ' ';
echo $description;

//connect to diary

$link = mysqli_connect("localhost", "root", "", "teacherstoolkit");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$sql = "UPDATE homeworkdiary SET finished='true' WHERE username = '$username' AND class = '$class' AND year = '$year' AND subject = '$subject' AND date = '$date'";

if ($link->query($sql) === TRUE) {
    echo "Record updated successfully";
	header('Location: ./studentHome.php');
} else {
    echo "Error updating record: " . $link->error;
}
?>