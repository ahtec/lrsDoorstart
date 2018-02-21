<?php
session_start();
require_once './connection.php';
require_once './functiesPHP.php';
include_once 'header.php';

?>
<html>
    <head>
	<link rel="stylesheet" type="text/css" href="opmaaklrs.css">
	<meta charset="utf-8" />
	<title> Leerlingen Absentie Registratie </title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="lrsscript.js"></script>
	<script>


	function afwezig(selectElement) {
		//Function  werkt niet vanuit de js file
		var parentDiv = selectElement.parentNode;
		var leerlingID = parentDiv.id;	
		var selectedIndexVanSelector = document.getElementById(selectElement.id).selectedIndex;
		var absentieCodeUitSelect    = document.getElementById(selectElement.id).options[selectedIndexVanSelector].text;
	//	console.log(leerlingID);
	//	console.log(absentieCodeUitSelect);
		$(selectElement).fadeTo("slow", 0.40);


		$.post("storeAfwezigheid.php", {leerlingID: leerlingID , absentieCode: absentieCodeUitSelect}, function (data, status) {
	//			$.post("./registreerAanwezigheid.php",  function(data){                                          
	//    console.log(searchString);
	//			$(this).html(data);
		console.log(data);
		console.log(status);
		

		});
	}

	</script>

<style>			
table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 15px 50px;
	border: 1px solid white;
    border-radius: 10px;
}

img {
  width: 100%;

}

td  {
    vertical-align: top;
    border-spacing: 15px 50px;
	border: 1px solid white;
    border-radius: 10px;

}

#naam {
	text-align:center;
	 vertical-align: text-top;
	font-size: 20px;
	font-family: arial;
		color: white;
}

#inverse {
		color: red;
}

		</style>
		
    </head>
    <body>
	


    <?php 

	$sql = "SELECT * FROM `leerling`";
	$conn = connectToDb();
	$result = $conn->query($sql);
	echo "<div> <table>";
	$rijTeller = 1;

	while ($row = mysqli_fetch_array($result)) {
		echo "\n";
		if (leerlingIsVandaagNogNietAanwezigGeregistreerd($row['id'])) {
			if ($rijTeller == 1 ) {
				echo "<tr>";
			}	
			echo "<td> <img id = " . $row['id'] . " src=" . $row['foto'] ;
			echo " onclick='myPopup_absentie(this)' ><p id=naam >" .$row['naam'] . "</td>";
			
			$rijTeller++;
			if ($rijTeller > 4 ) {
				$rijTeller = 1;
				echo "</tr>";
			}

		} 
	}
	if ($rijTeller <> 1 ) {
		echo "</tr>";
	}
	
	echo "</table>";
		
	echo "<div class='subclass' id='subclass'ondrop='drop(event, this)' ondragover='allowDrop(event)'>";
	echo "</div >";
	echo "<div id='zoekvak' ondrop='drop(event,this)' ondragover='allowDrop(event)'class='zoek'>";
	echo "</div >";

	?>

        </div>
        <footer>
                       Aanwezigheids registratie versie 2.0
        </footer>
    </body>
</html>