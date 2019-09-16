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

$sql = "SELECT username, password, name, status, userDataFileLocation, class, year FROM userinformation";
$result = $link->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        if($row["class"] == $class && $row["year"] == $year){
			$username = $row["username"];
			$sql = "INSERT INTO homeworkdiary (subject, description, task, class, year, username, finished) VALUES ('$subject', '$description', '$task', '$class', '$year', '$username', 'false')";
			if ($link->query($sql) === TRUE) {
				echo $username . "'s homework added!";
			} else {
				echo "Error: " . $sql . "<br>" . $link->error;
			}
		}
    }
} else {
    echo "You're password or username is incorrect!!";
}

mysqli_close($link);
?>