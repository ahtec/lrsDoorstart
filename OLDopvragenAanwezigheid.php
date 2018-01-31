<?php
	session_start();
	require_once './connection.php';
	
	
	
	$sql = "SELECT *   FROM `aanwezigheid` JOIN  `leerling`  on  `leerling`.`id` =  `aanwezigheid`.`leerling_id` " ;
	echo($sql);
	$conn              = connectToDb();
	$result            = $conn->query($sql);
	
	echo "<div class='klas' > ";
	
	
	while ($row = mysqli_fetch_array($result)) {
		echo " <div class='leerling' > ";
		echo "<img id = " . $row['id'] . " src=" . $row['foto'] . " width=142  onclick='aanwezig(this)'>";
		echo "<div id = " . $row['id'] . " src=" . $row['naam'] . " ></div>";
		echo "<div id = " . $row['id'] . " src=" . $row['datum']. " ></div>";
		echo "<div id = " . $row['id'] . " src=" . $row['tijd'] . " ></div>";
		echo "<div id = " . $row['id'] . " src=" . $row['tijd'] . " width=142  onclick='aanwezig(this)'></div>";
	}
	echo "</div >";
	
	
		
	
?>      