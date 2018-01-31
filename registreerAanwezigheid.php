<?php
session_start();
require_once './connection.php';

$huidigeDatum = date("Y-m-d");
$huidigeTijd  = date("Hi");
$conn = connectToDb();
$sql = "SELECT * FROM aanwezigheid where `leerling_id` = ".$_REQUEST['leerlingID'] .
	" and `datum` = '$huidigeDatum'" ;
$result = $conn->query($sql);
if ($result) {
	$row = mysqli_fetch_array($result) ;
	//		var_dump($row);
	if (isset($row['leerling_id'])) {
		echo " 27 ";
		$sql = "DELETE FROM `aanwezigheid`  ";
		$sql = $sql . "where `leerling_id` = ".$_REQUEST['leerlingID'] ;
		$sql = $sql . " and `datum` = '$huidigeDatum'" ;
		echo $sql;
		$result = $conn->query($sql);
		echo 25;
		
	}   else {
		$sql = "INSERT INTO `aanwezigheid`(`leerling_id`, `datum`, `tijd`, `absentiecode`, `klas`) VALUES (" .$_REQUEST['leerlingID'] ." ,'" . $huidigeDatum. "','". $huidigeTijd ." ',0 ,1)";
		$resultSet = $conn->query($sql);
		echo 30;
		}
}	else {
	$sql = "INSERT INTO `aanwezigheid`(`leerling_id`, `datum`, `tijd`, `absentiecode`, `klas`) VALUES (" .$_REQUEST['leerlingID'] ." ,'" . $huidigeDatum. "','". $huidigeTijd ." ',0 ,1)";
	$resultSet = $conn->query($sql);
	echo 30;
}

?>