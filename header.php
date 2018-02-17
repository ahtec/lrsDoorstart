<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <script>
	$(document).ready(function(){

		function maakMenu() {
//			alert("In menumaaker");
// alert(window.location.pathname);
//  /lrsDoorstart/absentieRegistratie.php
			var deelNamen = window.location.pathname.split("/");
//			console.log(deelNamen);

			var huidigePHP = deelNamen.pop();
			if (huidigePHP == "") {
//				alert("In leeg");
				huidigePHP = "index.php";
			}
			console.log(huidigePHP);


			var menuVar = document.getElementById("menuHierAan");
			var menuBalk = document.createElement("div");
			menuBalk.setAttribute("class", "main-wrapper");
			menuVar.appendChild(menuBalk);
			
			var ulTag = document.createElement("ul");
			menuBalk.appendChild(ulTag);
			var liTag = document.createElement("li");
			ulTag.appendChild(liTag);

			var aTag = document.createElement("a");
			
			aTag.setAttribute("href","index.php");
			aTag.innerHTML="Hoofdpagina";
			aTag.style.background = "black";
			aTag.style.color = "white";
			
            
			liTag.appendChild(aTag);
			
			var ulTag = document.createElement("ul");
			menuBalk.appendChild(ulTag);
			var liTag = document.createElement("li");
			ulTag.appendChild(liTag);
			
			var aTag = document.createElement("a");
			aTag.setAttribute("href","opvragenAanwezigheid.php");
			aTag.innerHTML="Opvragen aanwezigheid";
			liTag.appendChild(aTag);
			
			var ulTag = document.createElement("ul");
			menuBalk.appendChild(ulTag);
			var liTag = document.createElement("li");
			ulTag.appendChild(liTag);
			
			var aTag = document.createElement("a");
			aTag.setAttribute("href","absentieRegistratie.php");
			aTag.innerHTML="Absentie registratie";
			liTag.appendChild(aTag);
			
			
			
			console.log(menuVar);
     }

	maakMenu();

    $("header nav ul li a").hover(function() {
            $(this).children("ul").fadeIn(500).animate({top: '-=10'}, 500, function() { });
        }, function() {
            $("ul li > ul").fadeOut(500).animate({top: '+=10'}, 500, function() { });
    });
});
 </script>
	
</head>
<body>
	<header>
		 <nav>
		 	<section class="main-container"> <div class="banner"> <header><h1>Leerling Registratie Systeem</h1></header></div></section>
			<div id="menuHierAan"></div>
		</nav>
	</header>
</body>		
