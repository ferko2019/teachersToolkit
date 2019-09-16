<?php
$username = $_POST["username"];
$password = $_POST["password"];

include "databaseConfig.php";

session_start();

$_SESSION["username"] == $username;
$_SESSION["password"] == $password;

$link = mysqli_connect("localhost", "root", "", "teacherstoolkit");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

/*$sql = "INSERT INTO userinformation (username, password, name, status,userDataFileLocation) VALUES ('$username', '$password', 'asd', 'student', 'asd2')";
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}*/

$sql = "SELECT username, password, name, status, userDataFileLocation, class, year FROM userinformation";
$result = $link->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        if($row["username"] == $username && $row["password"] == $password){
			if($row["status"] == "student"){
				header('Location: studentHome.php');
				$_SESSION["class"] = $row["class"];
				$_SESSION["year"] = $row["year"];
				$_SESSION["username"] = $username;
				$_SESSION["password"] = $password;
			}
			if($row["status"] == "teacher"){
				header('Location: teacherHome.php');
			}
		}
    }
} else {
    echo "You're password or username is incorrect!!";
}

echo "You're password or username is incorrect!!";

// Close connection
mysqli_close($link);
?>