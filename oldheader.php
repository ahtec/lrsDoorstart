<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
		$("header nav ul li a").hover(function() {
            $(this).children("ul").fadeIn(500).animate({top: '-=10'}, 500, function() { });
        }, function() {
            $("ul li > ul").fadeOut(500).animate({top: '+=10'}, 500, function() { });
    });

	document.getElementById("demo").innerHTML ="Page path is: " + window.location.pathname;
	
	
	});
</script>
	
</head>
<body>
 <header>
	<p id="demo"></p>
    <nav><section class="main-container">
        <div class="banner">
            <header><h1>Leerling Registratie Systeem</h1></header>
        </div>
        </section>
	<div class="main-wrapper">
		<ul>
                    <li><a href="index.php">Hoofdpagina</a></li>
		</ul>
                <ul>
                    <li><a href="opvragenAanwezigheid.php">Opvragen aanwezigheid</a></li>
		</ul>
				<ul>
                    <li><a href="absentieRegistratie.php">Absentie registratie</a></li>
		</ul>

	</div>

    </nav>
	
</header>