<?php
require_once './connection.php';


function getAbsentieCode( $pDescAbsentie)  {
	$eruit = 1;
	$conn = connectToDb();
	$sql = "SELECT * FROM absentie where `signalering` = '" . $pDescAbsentie ."'";
	echo $sql;
	$result = $conn->query($sql);
	if ($result) {
		echo 12;
		$row = mysqli_fetch_array($result) ;
		echo 14;
		if (isset($row['id'])) {
			echo 16;
			$eruit = $row['id'] ;
		}
	}
	echo $eruit;
	return $eruit;
	
}


	function leerlingIsVandaagNogNietAanwezigGeregistreerd($paramLeerlingID) {
		$eruit = false;
		$huidigeDatum = date("Y-m-d");
		$huidigeTijd  = date("Hi");
		$conn = connectToDb();
		$sql = "SELECT * FROM aanwezigheid where `leerling_id` = ".$paramLeerlingID .
		" and datum = '$huidigeDatum'" ;
//		echo $sql;
		$result = $conn->query($sql);
		if ($result) {
			$row = mysqli_fetch_array($result) ;
			if (isset($row['leerling_id'])) {
//				echo " 56 ";
				$eruit = false ;
			} else	{
				//echo " 59 ";
				$eruit = true;
			}
		}  else {
//			echo " 63 ";
			
			$eruit = true;
		}
		$conn->close();
		return($eruit);
	}

	function zetLeerlingenOpHetScherm($alleenAbsenteLeerlingen){

		$sql = "SELECT * FROM `leerling`  ";
//		$sql = "SELECT * FROM `leerling`  order by `schermvolgnr`";
echo $sql;
		$conn = connectToDb();
		$recordSet = $conn->query($sql);
echo $recordSet;
		if ($recordSet) {
echo $recordSet;
echo "62";
			echo "<div id='thomas' class='klas' ondrop='drop(event,this)' ondragover='allowDrop(event)'> ";
				while ($row = mysqli_fetch_array($recordSet)) {
					if ($alleenAbsenteLeerlingen) {
						// dit is de tak voor de absente leerlingen registratie
						if (leerlingIsVandaagNogNietAanwezigGeregistreerd($row['id'])) {
							echo " <div class='GroupAanwezigheid' id='afbContainer'> ";
							echo "<img id = " . $row['id'] . " src=" . $row['foto'] . " width=130  onclick='myPopup_absentie(this)'> ";
							echo "</div>";
						} 
					} else {
						// dit is de tak voor de aanwezigheid  gewone
						if (leerlingIsVandaagNogNietAanwezigGeregistreerd($row['id'])) {
							echo " <div class='GroupAanwezigheid' id='afbContainer'> ";
						}  else {
							echo " <div  style='opacity:0.4' class='GroupAanwezigheid' id='afbContainer'> ";
						}
						echo "<img draggable='true' ondragstart='drag(event,this)'  id = " . $row['id'] . " src=" . $row['foto'] . " width=130  onclick='aanwezig(this)'> ";
						echo "</div>";
					} 
				}
			echo "</div >";
		}	
	}
	

        function createTagSelect($selectidname) {
			$ParamConn = connectToDb();
            $sql           = "SELECT * FROM `absentie` ";
            $erinResultSet = $ParamConn->query($sql);
            $eruit = "<select id=$selectidname onClick=afwezig(this); >";  
            for ($x = 0; $x < $erinResultSet->num_rows; $x++) {
                $row = $erinResultSet->fetch_assoc();  
				$eruit .= "<option >";   
                $eruit .= "["; 
                $eruit .= $row['id']; 
                $eruit .= "]  "; 
                $eruit .= $row['signalering'];
                $eruit .= "</option>";
            }
            $eruit .= "</select>"; 

            return $eruit; 
        }

        function createButons($selectidname) {
			$eruit = "";
			$ParamConn = connectToDb();
            $sql           = "SELECT * FROM `absentie` ";
            $erinResultSet = $ParamConn->query($sql);
            for ($x = 0; $x < $erinResultSet->num_rows; $x++) {
                $row = $erinResultSet->fetch_assoc();  
//				echo $row['signalering'];
				$sg=$row['signalering'];
				$eruit .= "<a href=  opvragenAanwezigheid.php?absentieCode=". $sg. "> ".$sg . " </a>";
			}

            return $eruit; 
        }

	
	
	

?>
