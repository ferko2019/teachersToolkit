<?php
//setup variables
session_start();

$username = $_SESSION["username"];
$password = $_SESSION["password"];
$class = $_SESSION["class"];
$year = $_SESSION["year"];

//connect to diary

$link = mysqli_connect("localhost", "root", "", "teacherstoolkit");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>
<html>
<head>
<title>teacherToolkit|Home</title>
<style>
.navBar {
  list-style-type: none;
  margin: 0;
  padding: 0;
  width: 100%;
}

.navBarLi {
  display: inline;
  float: left;
  width: 14.28%;
}

.navBarButton {
  list-style-type: none;
  text-align: center;
  font-size: 150%;
  text-decoration: none;
  display: block;
  padding: 8px;
  background-color: #b5b5b5;
  color: #000000;
  height: 5%;
}

.navBarButton:hover {
	background-color: #db3309;
}

.navBarImg {
}

.background {
	background-color: #ffffff;
}

.diaryPoints {
	border: 0px solid #40c27c;
	background-color: #40c27c;
}

.diaryContents {
	border-collapse: collapse;
	font-size: 175%;
}
</style>
</head>
<body class="background">
<ul class="navBar">
	<li class="navBarLi"><img class="navBarImg" src="./logo.png"></li>
	<li class="navBarLi"><a href="studentHome.php" class="navBarButton">Home</a></li>
	<li class="navBarLi"><a href="" class="navBarButton">Timetable</a></li>
	<li class="navBarLi"><a href="studentHomeworks.php" class="navBarButton">Homeworks</a></li>
	<li class="navBarLi"><a href="" class="navBarButton">Tasks</a></li>
	<li class="navBarLi"><a href="studentDiary.php" class="navBarButton">Diary</a></li>
	<li class="navBarLi"><a href="index.php" class="navBarButton">Log out</a></li>
</ul>
<table class="pageContent">
	<tr>
	<td>
	<table border="1" class="diaryContents">
		<tr class="diaryPoints"><th>Grade</th><th>Subject</th></tr>
		<?php
			$sql = "SELECT username, password, class, year, value, subject FROM studentdiary ORDER BY 'value' ASC";
			$result = $link->query($sql);

			if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
					if($row["username"] == $username && $row["password"] == $password){
						echo '<tr><td class="gradeElement">' . $row["value"] . '</td><td class="gradeElement">'. $row["subject"] . '</td></tr>';
					}
				}
			} else {
				echo "ERROR";
			}
		?>
	</table>
	</td>
	</tr>
</table>
</body>
</html>