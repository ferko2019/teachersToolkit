<?php
$username = $_POST["username"];
$value = $_POST["value"];
$subject = $_POST["subject"];

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
        if($row["username"] == $username){
			$password = $row["password"];
			$year = $row["class"];
			$class = $row["year"];
			$sql = "INSERT INTO studentdiary (username, password, class, year, value, subject) VALUES ('$username', '$password', '$class', '$year', '$value', '$subject')";

			if ($link->query($sql) === TRUE) {
				echo "New record created successfully";
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