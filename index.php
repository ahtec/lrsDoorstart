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
                    var temp = window.getComputedStyle(leerling).getPropertyValue("opacity");
                    console.log(temp);
                    if (temp == 1) {
                        $(leerling).fadeTo("slow", 0.40);
                    } else {
                        $(leerling).fadeTo("slow", 1.0);
                    }
                });
            }
        </script>
        <link rel="stylesheet" type="text/css" href="opmaaklrs.css">
        <meta charset="utf-8" />
        <title> Leerlingen Registratie Systeem </title>
        <style>	
            div.figure {
                float: right;
                border: thin silver solid;
                margin: 0.5em;
                padding: 0.5em;
            }

            div.figure p {
                text-align: center;
                font-style: italic;
                font-size: smaller;
                text-indent: 0;
            }

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

            #gryednaam {
                text-align:center;
                vertical-align: text-top;
                font-size: 20px;
                font-family: arial;
                color: black;
            }



        </style>
    </head>
    <body>
        <?php
        $sql = "SELECT * FROM `leerling`";
        $conn = connectToDb();
        $result = $conn->query($sql);
        echo "<div> <table>";
        $rijTeller = 0;

        while ($row = mysqli_fetch_array($result)) {
            $rijTeller++;
//				echo $rijTeller;
            echo "\n";
            if ($rijTeller > 4) {
                $rijTeller = 1;
                echo "</tr>";
            }
            if ($rijTeller == 1) {
                echo "<tr>";
            }
            if (leerlingIsVandaagNogNietAanwezigGeregistreerd($row['id'])) {
                echo "<td> <img id = " . $row['id'] . " src=" . $row['foto'];
                echo "   onclick='aanwezig(this)' ><p id=naam >" . $row['naam'] . "</td>";
            } else {
                echo "<td>  <img  style='opacity:0.4' id = " . $row['id'] . " src=" . $row['foto'];
                echo "   onclick='aanwezig(this)' ><p id=gryednaam >" . $row['naam'] . "</td>";
            }
        }
        echo "</tr>";


        echo "</table>";

        echo "<div class='subclass' id='subclass'ondrop='drop(event, this)' ondragover='allowDrop(event)'>";
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
