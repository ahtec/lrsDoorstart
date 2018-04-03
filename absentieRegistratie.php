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


            function afwezig(leerlingID, absentieCodeUitSelect, pElement) {
                console.log(leerlingID);
				console.log(absentieCodeUitSelect);
                $.post("storeAfwezigheid.php", {
                    leerlingID: leerlingID,
                    absentieCode: absentieCodeUitSelect},
                        function (data, status) {
                            console.log(data);
                            console.log(status);
                            if (status == "success") {
                                leerlingImg = document.getElementById(leerlingID);
                                console.log(pElement);
                                $(leerlingImg).fadeTo("slow", 0.40);
                                pElement.style.background = "black";
                                pElement.style.color = "white";


                            }
                        });
            }


            function test(par, par2) {
                console.log(par);
                console.log(par2);
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
                max-width: 300px;
                min-width: 100px;
                width: 100%;
                border-radius: 10px 10px 0px 0px;

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

            #flexboxAbsentie {
                display: flex;
                /*flex-direction:row;*/
                display: flexbox;
                flex-wrap:wrap;
                border: 1px solid white;
                border-radius: 10px;
                margin-top: 100px;
                min-height: 15px;
            }

            #flexboxAbsentie >div {
                max-width: 250px;
                /*max-height: 400px;*/
                border: 1px solid white;
                border-radius: 10px;
                margin: 5px;  
            }
        </style>

    </head>
    <body>



        <?php

        function createButons($selectidname) {
            $eruit = "";
            $ParamConn = connectToDb();
            $sql = "SELECT * FROM `absentie` WHERE `id` <> 0 ";
            $erinResultSet = $ParamConn->query($sql);
            for ($x = 0; $x < $erinResultSet->num_rows; $x++) {
                $row = $erinResultSet->fetch_assoc();
//                echo $row['signalering'];
                $sg = $row['signalering'];
                $absentieCode = $row['signalering'];
//                $eruit .= "<a href=  opvragenAanwezigheid.php?absentieCode=". $selectidname. "> ".$sg . " </a>";
//                $eruit .= "<button onclick='test(" .$selectidname. " ," . $sg. " )' >"   . $sg . " </button>";
//                $eruit .= "<button onclick='test($selectidname ,'$sg')' >"   . $sg . " </button>";
                $eruit .= sprintf("<button onclick=afwezig(%s,'%s',this) >%s  </button>", $selectidname, $absentieCode, $sg);
            }

            return $eruit;
        }

        $sql = "SELECT * FROM `leerling`";
        $conn = connectToDb();
        $result = $conn->query($sql);
        echo "<div id=flexboxAbsentie>";
//	$rijTeller = 1;

        while ($row = mysqli_fetch_array($result)) {
            echo "\n";
            if (leerlingIsVandaagNogNietAanwezigGeregistreerd($row['id'])) {
//			if ($rijTeller == 1 ) {
//				echo "<tr>";
//			}	
                echo "<div> <img id = " . $row['id'] . " src=" . $row['foto'];
                echo "  ><p id=naam >" . $row['naam'];
                echo "</p> <p> " . createButons($row['id']);
                echo "</p> </div>";

//			$rijTeller++;
//			if ($rijTeller > 4 ) {
//				$rijTeller = 1;
//				echo "</div>";
//			}
            }
        }
//	if ($rijTeller <> 1 ) {
//		echo "</tr>";
//	}
//	
        echo "</div>";

//	echo "<div class='subclass' id='subclass'ondrop='drop(event, this)' ondragover='allowDrop(event)'>";
//	echo "</div >";
//	echo "<div id='zoekvak' ondrop='drop(event,this)' ondragover='allowDrop(event)'class='zoek'>";
//	echo "</div >";
        ?>

    </div>
    <!--        <footer>
                           Aanwezigheids registratie versie 2.0
            </footer>-->
</body>
</html>