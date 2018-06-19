<?php
    
	define('DB_HOST', 'localhost');
	define('DB_USER', 'root');
	define('DB_PASSWORD', '');
	define('DB_NAME', 'hotel');

    $dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die('could not connect'. mysqli_connect_error());

	mysqli_set_charset($dbc,"utf8");

	$come = $_REQUEST['checkIn'];
	$go = $_REQUEST['checkOut'];
	$adults = $_REQUEST['adultNum'];
	$child = $_REQUEST['childNum'];
	$totalPrice = $_REQUEST['totalPrice'];
	

    if ($_REQUEST['task'] == "succ") {
			$query = "INSERT INTO booking (checkIn, checkOut, adultsNumber, childrenNumber,price) VALUES ('$come','$go','$adults','$child','$totalPrice')";

            $result = @mysqli_query($dbc, $query);
            if ($result) {
                echo('SUCC');
            } else {
                echo mysqli_error($dbc);
            }
        }
        
?>