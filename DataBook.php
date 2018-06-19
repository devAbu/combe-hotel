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

	$come = $_POST['checkIn'];
	$go = $_POST['checkOut'];
	$adults = $_POST['adultsNum'];
	$child = $_POST['childrenNum'];
	$price = $_POST['price'];

	echo "<br>".$_POST['checkIn'];
	echo "<br>".$_POST['checkOut'];
	echo "<br>".$_POST['adultsNum'];
	echo "<br>".$_POST['childrenNum'];
	//echo "<br>".$_POST['price'];

    $query = "INSERT INTO `booking` (checkIn, checkOut, adultsNumber, childrenNumber,price) VALUES ('$come','$go','$adults','$child','0')";
		
	if(mysqli_query($connection,$query)){
		echo "<h3>Reservation completed</h3>";
		header("refresh:1,url=index.php");
	}else{
		echo "<h1>There is a problem. </h1>";
		echo "<br>";
		echo "<h3>Please try again later!!!</h3>";
		echo "<br>";
		header("refresh:1,url=index.php");
	}
}
?>
