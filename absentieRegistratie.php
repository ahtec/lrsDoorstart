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
		<style>
#test{
  position: absolute;
     margin-left: 30%;

}	

		</style>
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

        <link rel="stylesheet" type="text/css" href="opmaaklrs.css">
        <style>

        </style>
        <meta charset="utf-8" />
        <title> Leerlingen Absentie Registratie </title>
    </head>
    <body>
        <div class="topnav">
            <header class="subtopnav"> Absente leerlingen  </header>
        </div>
<!--        <nav>

        </nav>-->

    <?php zetLeerlingenOpHetScherm(TRUE);    ?>

        </div>
        <footer>
            ITPH project mede mogelijk gemaakt door: Thomas, Bas, Gerard en Derk
        </footer>
    </body>
</html>