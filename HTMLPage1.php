<?php
session_start();
require_once './connection.php';
require_once './functiesPHP.php';

include_once 'header.php';
?>

<html>
    <head>
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>   
       <script src="lrsscript.js"></script>
        <script>
            function aanwezig(leerling) {
                //Function voor het registeren van de leerling, werkt niet vanuit de js file
                console.log(leerling.id);

                $.post("registreerAanwezigheid.php", {leerlingID: leerling.id}, function (data, status) {
                    //			$.post("./registreerAanwezigheid.php",  function(data){                                          
                    //				alert("Data: " + data + "\nStatus: " + status);
                    //				$('#somediv').html(data);
                    console.log(leerling);
					var  temp = window.getComputedStyle(leerling).getPropertyValue("opacity");
                    console.log(temp);
					if (temp == 1) {
						$(leerling).fadeTo("slow", 0.40);
					} else  {
						$(leerling).fadeTo("slow", 1.0);
					}
                });
            }
        </script>
        <link rel="stylesheet" type="text/css" href="opmaaklrs.css">
        <meta charset="utf-8" />
        <title> Leerlingen Registratie Systeem </title>
    </head>
    <body>
        <div class="topnav">
            <header class="subtopnav"> Klas </header>
        </div>
        <div class="klas">
            <?php
            $sql = "SELECT * FROM `leerling`";
            $conn = connectToDb();
            $result = $conn->query($sql);

            echo "<div class='klas'  id='klasID' ondrop='drop(event)' ondragover='allowDrop(event)'> ";
                echo "<div class='subclass' id='subclass'ondrop='drop(event, this)' ondragover='allowDrop(event)'>";

                while ($row = mysqli_fetch_array($result)) {
					if (leerlingIsVandaagNogNietAanwezigGeregistreerd($row['id'])) {
						echo "<img id = " . $row['id'] . " src=" . $row['foto'] . " width=130  onclick='aanwezig(this)' draggable='true' ondragstart='drag(event)'>";
					} else {
						echo "<img  style='opacity:0.4' id = " . $row['id'] . " src=" . $row['foto'] . " width=130  onclick='aanwezig(this)' draggable='true' ondragstart='drag(event)'>";
						}
				}
                echo "</div >";
                echo "<div id='zoekvak' ondrop='drop(event,this)' ondragover='allowDrop(event)'class='zoek'>";
            echo "</div >";
            ?>
		</div >
		<div class="button">
            <button id="newstudent" type="submit" onclick="myPopup()" value="Leerling opvoeren" >Opvoeren Leerling</button> 
        </div>
        <footer>
            ITPH project mede mogelijk gemaakt door: Thomas, Bas, Gerard en Derk
        </footer>
    </body>
</html> 
