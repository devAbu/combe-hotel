<?php 

$hostname = "localhost";
$username = "root";
$pass = "";
$dataBaseName = "hotel";

$connection = mysqli_connect($hostname, $username, $pass);
$selection = mysqli_select_db($connection, $dataBaseName);

$mail = $_POST['mail'];
$password = $_POST['pass'];


echo "Email :  " .$mail. "<br>";
echo "Password :   " .$password. "<br>";


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
	$sql = "SELECT `Email`, `pass` FROM `registration` WHERE `Email` = '$mail' ";
    $result = $connection->query($sql);

	if ($result->num_rows > 0) {
             while($row = $result->fetch_assoc()) {
				echo $row['Email']. " ".$row['pass'];
				if($row['Email'] == $mail ){
					if($row['pass'] == $password){
						echo "<h2>Login is successful!!! <br></h2>";
						$query = "INSERT INTO login (email, password) VALUES ('$mail', '$password')";
						$result = mysqli_query($connection, $query);

						session_start();
						$_SESSION['username'] = $row['Email'];

						header("location: index.php" );
					}else{
						echo "<h2>Password is incorrect!!!</h2>";
						header("refresh:2, url=log.php");
					}
				}
             }
        } else {
            echo "<h2>Email does not exists!!!</h2>";
			header("refresh:1, url=log.php");
          }
}
?>