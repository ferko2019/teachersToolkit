<?php
$username = $_POST["username"];
$password = $_POST["password"];
$name = $_POST["name"];
$class = $_POST["class"];
$year = $_POST["year"];
$status = $_POST["status"];
$userDataFileLocation = $_POST["userDataFileLocation"];

include "databaseConfig.php";

$link = mysqli_connect("localhost", "root", "", "teacherstoolkit");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$sql = "INSERT INTO userinformation (username, password, name, status, userDataFileLocation, class, year) VALUES ('$username', '$password', '$name', '$status', '$userDataFileLocation', '$class', '$year')";

if ($link->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $link->error;
}

mysqli_close($link);
?>