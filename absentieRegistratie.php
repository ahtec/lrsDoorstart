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
//            $(document).ready(function () {
//                $("button").click(function () {
//                   console.log($(this));
//                    knop = $(this);
////                    console.log(knop);
//                    var text = "";
//                    var i;
////                    for (i = 0; i < knop.length; i++) {
////                        text += knop.elements[i].value + "<br>";
////                    }
//                    
////                    inhoudKnop = knop.elements[0].innerHTML;
//                    inhoudKnop = knop.outherHTML;
//                    leerlingID = knop.value;
//                    console.log(inhoudKnop);
//                    afwezig($(this));
//
//                })
//            })
//
//


            function afwezig(leerlingID,absentieCodeUitSelect ) {
//                console.log(selectElement);
                //Function  werkt niet vanuit de js file
//                var parentDiv = selectElement.parentNode;
//                console.log(parentDiv);


//                var leerlingID = selectElement.id.value;
                console.log(leerlingID);
                
//                var leerlingID = parentDiv.id;
//                var selectedIndexVanSelector = document.getElementById(selectElement.id).selectedIndex;
//                var absentieCodeUitSelect = document.getElementById(selectElement.id).options[selectedIndexVanSelector].text;
//                console.log(leerlingID);
//                console.log(absentieCodeUitSelect);
//                $(selectElement).fadeTo("slow", 0.40);


                $.post("storeAfwezigheid.php", {leerlingID: leerlingID, absentieCode: absentieCodeUitSelect}, function (data, status) {
                    //			$.post("./registreerAanwezigheid.php",  function(data){                                          
                    //    console.log(searchString);
                    //			$(this).html(data);
                    console.log(data);
                    console.log(status);
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

            img {
                max-width: 300px;
                min-width: 100px;
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
                max-width: 400px;
                max-height: 400px;
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
            $sql = "SELECT * FROM `absentie` ";
            $erinResultSet = $ParamConn->query($sql);
            for ($x = 0; $x < $erinResultSet->num_rows; $x++) {
                $row          = $erinResultSet->fetch_assoc();
//                echo $row['signalering'];
                $sg           = $row['signalering'];
                $absentieCode = $row['signalering'];
//                $eruit .= "<a href=  opvragenAanwezigheid.php?absentieCode=". $selectidname. "> ".$sg . " </a>";
//                $eruit .= "<button onclick='test(" .$selectidname. " ," . $sg. " )' >"   . $sg . " </button>";
//                $eruit .= "<button onclick='test($selectidname ,'$sg')' >"   . $sg . " </button>";
                $eruit .= sprintf("<button onclick=afwezig(%s,'%s') >%s  </button>",$selectidname,$absentieCode,$sg);

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