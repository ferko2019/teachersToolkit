<html>
<head>
<link rel="icon" type="image/ico" href="favicon.ico"> 
<title>teacherTools|Login</title>
<style>
input[type=text] {
	width: 80%;
	height: 5%;
	margin: 1% 10%;
	border: 2px solid orange;
	color: white;
	background-color: #e3be66;
	border-radius: 5px;
}
input[type=password] {
	width: 80%;
	height: 5%;
	margin: 0% 10%;
	border: 2px solid orange;
	color: white;
	background-color: #e3be66;
	border-radius: 5px;
}

.logInText {
	margin: auto;
	width: 15%;
	padding: 10px;
}

.logInButton {
	margin: 0% 37.5%;
	width: 15%;
	height: 10%;
	padding: 10px;
	color: white;
	background-color: orange;
}

.logInButton:active {
	background-color: #e3be66;
}

.menuImg {
	margin: auto;
	width: 18%;
	padding: 10px;
}
</style>
</head>
<body>
<h1 class="menuImg">
<img src="./logo.png">
</h1>
<form action="logInCode.php" method="POST">
<class id="logIn" name="logIn">
<h1 class="logInText">Username:</h1>
<input type="text" placeholder="username" id="username" name="username" style="float:middle"><p>
<h1 class="logInText">Password:</h1>
<input type="password" placeholder="password" id="password" name="password"><p>
<input type="submit" value="Login" class="logInButton">
</class>
</form>
</body>
</html>