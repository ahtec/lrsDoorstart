<?php
	session_start();
	require_once './connection.php';
	$leerlingID 	= 	$_REQUEST['leerlingID'];
	$newKlas		=	$_REQUEST['nieuweKlas'];
	$conn 	= connectToDb();
	$sql = "SELECT *   FROM `leerling`  where `id` = '$leerlingID' ";
	$result = $conn->query($sql);
	if ($result) {
		$sql = "UPDATE `leerling` SET `klas`= '$newKlas' WHERE `id` = '$leerlingID'";
		if ($conn->query($sql) == FALSE) {
			echo "Update leerling mislukt" . $conn->error;
		}
	} else {
			echo "Leerling niet gevinden mislukt" . $leerlingID;
			echo "erooro :" . $conn->error;
		
	}
	$conn->close();
//	header("Location: HTMLPage1.php");
?>
