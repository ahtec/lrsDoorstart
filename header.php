<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <script>
	$(document).ready(function(){

		function maakMenu() {
			var deelNamen = window.location.pathname.split("/");

			var huidigePHP = deelNamen.pop();
			if (huidigePHP == "") {
				huidigePHP = "index.php";
			}

			var menuItems = [
				"index.php",
				"opvragenAanwezigheid.php",
				"absentieRegistratie.php"];
			
			var menuOmschrijvingen = [
				"Wie is er",
				"Opvragen",
				"Waarom is i er niet"];

			var menuVar = document.getElementById("menuHierAan");
			var menuBalk = document.createElement("div");
			menuBalk.setAttribute("class", "main-wrapper");
			menuVar.appendChild(menuBalk);

			for (i = 0; i < menuItems.length; i++) { 
				//text += cars[i] + "<br>";
				var ulTag = document.createElement("ul");
				menuBalk.appendChild(ulTag);
				var liTag = document.createElement("li");
				var uitkomst = geefAtag(menuItems[i],huidigePHP,menuOmschrijvingen[i]);
				liTag.appendChild(uitkomst);
				ulTag.appendChild(liTag);
			}
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
            $(this).children("ul").fadeIn(400).animate({top: '-=10'}, 400, function() { });
        }, function() {
            $("ul li > ul").fadeOut(400).animate({top: '+=10'}, 400, function() { });
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
