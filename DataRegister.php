<?php

$hostname = "localhost";
$username = "root";
$pass = "";
$dataBaseName = "hotel";

$connection = mysqli_connect($hostname, $username, $pass);
$selection = mysqli_select_db($connection, $dataBaseName);

$success = true;

if(!$connection){
	die("connection failed ".mysqli_error());
	$success = false;
}

if(!$selection){
	die("selection failed ".mysqli_error());
	$success = false;
}

if($success){

	$first = $_POST['first'];
	$last = $_POST['last'];
	$mail = $_POST['mail'];
	$pass = $_POST['pass'];

	echo "<br>".$_POST['first'];
	echo "<br>".$_POST['last'];
	echo "<br>".$_POST['mail'];
	echo "<br>".$_POST['pass'];

    $query = "INSERT INTO `registration` (name, surname, Email, pass) VALUES ('$first','$last','$mail','$pass')";
		
	if(mysqli_query($connection,$query)){
		echo "<h3>Account created</h3>";
		header("refresh:1,url=index.php");
	}else{
		echo "<h1>Account doesn't created. </h1>";
		echo "<br>";
		echo "<h3>Email already exists!!!</h3>";
		echo "<br>";
		header("refresh:1,url=register.php");
	}
}
?>
