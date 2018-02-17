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
					var uitkomst = geefAtag("index.php",huidigePHP,"Hoofdpagina");
					liTag.appendChild(uitkomst);
				ulTag.appendChild(liTag);

			var ulTag = document.createElement("ul");
			menuBalk.appendChild(ulTag);
				var liTag = document.createElement("li");
					var uitkomst = geefAtag("opvragenAanwezigheid.php",huidigePHP,"Opvragen aanwezigheid");
					liTag.appendChild(uitkomst);
				ulTag.appendChild(liTag);


			var ulTag = document.createElement("ul");
			menuBalk.appendChild(ulTag);
				var liTag = document.createElement("li");
					var uitkomst = geefAtag("absentieRegistratie.php",huidigePHP,"Absentie registratie");
					liTag.appendChild(uitkomst);
				ulTag.appendChild(liTag);

			
			
			
			console.log(menuVar);
			
     }
	 
	function geefAtag(menuItem,huidigePHP,menuText){
		var aTag = document.createElement("a");
		aTag.setAttribute("href",menuItem);
		aTag.innerHTML = menuText;
		if (menuItem == huidigePHP ) {
			aTag.style.background = "black";
			aTag.style.color = "white";
		}
		return(aTag);
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
