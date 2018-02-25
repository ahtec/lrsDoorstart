<?php
session_start();
require_once './connection.php';
require_once './functiesPHP.php';
//echo showHeader();

/*	$item      = $_SESSION['item'];
	$desc      = $_SESSION['desc'];
	$stock     = $_SESSION['stock'];
	$minStock  = $_SESSION['minStock'];
	$maxStock  = $_SESSION['maxStock'];
	$warehouse = $_SESSION['warehouse'];
	require_once './connection.php';
	require_once './model.php';
*/	
	$eruit = FALSE;
	$huidigeDatum = date("Y-m-d");
	$huidigeTijd  = date("Hi");
	$conn = connectToDb();
	$absentieCode =  getAbsentieCode($_REQUEST['absentieCode']);
	
	
	$sql = "SELECT * FROM aanwezigheid where `leerling_id` = ".$_REQUEST['leerlingID'] .
		" and `datum` = '$huidigeDatum'" ;
	if ($absentieCode != 0)  {
		echo $sql;
		$result = $conn->query($sql);
		if ($result) {
			$row = mysqli_fetch_array($result) ;
	//		var_dump($row);
			if (isset($row['leerling_id'])) {
				echo " 27 ";
				$sql = "UPDATE `aanwezigheid`   SET `absentiecode` = '$absentieCode'";
				$sql = $sql . "where `leerling_id` = ".$_REQUEST['leerlingID'] ;
				$sql = $sql . " and `datum` = '$huidigeDatum'" ;
				echo $sql;
				$result = $conn->query($sql);


			} else	{
				echo " 30 ";
				$sql = "INSERT INTO `aanwezigheid`(`leerling_id`, `datum`, `tijd`, `absentiecode`, `klas`)";
				$sql = $sql . "VALUES (";
				$sql = $sql . "'" . $_REQUEST['leerlingID']   . "' ," ;
				$sql = $sql . "'" . $huidigeDatum             . "' ," ;
				$sql = $sql . "'" . $huidigeTijd              . "' ," ;
				$sql = $sql . "'" . $absentieCode             . "' ," ;
				$sql = $sql . "'1')" ;
				echo $sql;
				$result = $conn->query($sql);
				
			$eruit = $result;
			}
		}  else {
			echo " bestaat al" ;
		}
	}
	$conn->close();
//	header("Location: absentieRegistratie.php");
//	return($eruit);
		


//sql = "SELECT * FROM `aanwezigheid` WHERE `leerling_id` =".$_REQUEST['leerling_id'];
// $sql = "INSERT INTO `aanwezigheid`(`leerling_id`, `datum`, `tijd`, `absentiecode`, `klas`) VALUES (" .$_REQUEST['leerlingID'] ." ,'" . $huidigeDatum. "','". $huidigeTijd ." ',0 ,1)";
//echo $sql;	
	//	$sql = "SELECT * FROM `aanwezigheid` WHERE 1 LIMIT 1 offset " . $_GET['leerlingID'];
//	echo($sql);
//	$resultSet = $conn->query($sql);
//	if ( mysqli_num_rows($resultSet) != 1 ) {
//		$row = $resultSet->fetch_assoc();
//		echo( $row['leerling_id'] ) ;
//	} else {
//	echo "aantal  ongelijk aan 1";
	
//	}
/*
	$item      = $row['item'];
	$desc      = $row['description'];
	$stock     = $row['stock'];
	$minStock  = $row['minStock'];
	$maxStock  = $row['maxStock'];
	$warehouse = $row['warehouse'];
	$_SESSION['item']      = $row['item'];
	$_SESSION['desc']      = $row['description'];
	$_SESSION['stock']     = $row['stock'];
	$_SESSION['minStock']  = $row['minStock'];
	$_SESSION['maxStock']  = $row['maxStock'];
	$_SESSION['warehouse'] = $row['warehouse'];
	$objTransportItem = new item();
	$objTransportItem->item        = $item;
	$objTransportItem->description = $desc;
	$objTransportItem->stock       = $stock;
	$objTransportItem->minStock    = $minStock;
	$objTransportItem->maxStock    = $maxStock;
	$objTransportItem->warehouse   = $warehouse;
	echo json_encode($objTransportItem);
*/	
?>