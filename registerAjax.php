<?php
    
	define('DB_USER', 'root');
	define('DB_PASSWORD', '');
	define('DB_HOST', 'localhost');
	define('DB_NAME', 'hotel');

    $dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die('could not connect'. mysqli_connect_error());

	mysqli_set_charset($dbc,"utf8");

	$firstName = $_REQUEST['first'];
	$lastName = $_REQUEST['last'];
	$mail = $_REQUEST['mail'];
	$password = $_REQUEST['pass'];
	


    if ($_REQUEST['task'] == "newAcc") {
		$query = "INSERT INTO registration (name, surname, Email, pass) VALUES ('$firstName','$lastName','$mail','$password')";
        
            $response = @mysqli_query($dbc, $query);
            if ($response) {
                echo('GOOD');
			}else{
				echo mysqli_error($dbc);
			}
		}
        
?>