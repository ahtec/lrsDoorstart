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
        <title> Leerlingen Registratie Systeem </title>
        <script src="lrsscript.js"></script>
		</head>
    <style>	
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

        #gryednaam {
            text-align:center;
            vertical-align: text-top;
            font-size: 20px;
            font-family: arial;
            color: black;
        }


    </style>

    <body>
        <?php
        function createButons($selectidname) {
			$eruit = "";
			$ParamConn = connectToDb();
            $sql           = "SELECT * FROM `absentie` ";
            $erinResultSet = $ParamConn->query($sql);
            for ($x = 0; $x < $erinResultSet->num_rows; $x++) {
                $row = $erinResultSet->fetch_assoc();  
//                echo $row['signalering'];
                $sg=$row['signalering'];
                $eruit .= "<a href=  opvragenAanwezigheid.php?absentieCode=". $sg. "> ".$sg . " </a>";
            }

            return $eruit; 
        }

        echo "<div class='topnav' >" . createButons("test");
        echo "<a href=  opvragenAanwezigheid.php?absentieCode=999 >Afwezig</a>";
        echo "<a href=  opvragenAanwezigheid.php?absentieCode=900 >Vandaag</a>";
        echo "</div>";
            if ($_REQUEST) {
                if (isset($_REQUEST['absentieCode'])) {
                    if ($_REQUEST['absentieCode'] == "999") {
                        $sql = "SELECT * , `leerling`.`id` as `leerlingID`  FROM `aanwezigheid` JOIN  `leerling`  on  `leerling`.`id` =  `aanwezigheid`.`leerling_id` ";
                        $sql = $sql . " JOIN  `absentie`  on  `absentie`.`id` =  `aanwezigheid`.`absentiecode`";
                        $sql .= " where `signalering` <> 'Aanwezig' ";
                    } else {   
						if ($_REQUEST['absentieCode'] == "900") {
							$huidigeDatum = date("Y-m-d");
							$sql = "SELECT * , `leerling`.`id` as `leerlingID`  FROM `aanwezigheid` JOIN  `leerling`  on  `leerling`.`id` =  `aanwezigheid`.`leerling_id` ";
							$sql = $sql . " JOIN  `absentie`  on  `absentie`.`id` =  `aanwezigheid`.`absentiecode`";
							$sql .= " where `datum` =  '$huidigeDatum' ";
						} else {	
					
							$sql = "SELECT * , `leerling`.`id` as `leerlingID`  FROM `aanwezigheid` JOIN  `leerling`  on  `leerling`.`id` =  `aanwezigheid`.`leerling_id` ";
							$sql = $sql . " JOIN  `absentie`  on  `absentie`.`id` =  `aanwezigheid`.`absentiecode`";
							$sql .= sprintf(" where `signalering` ='%s' ", $_REQUEST['absentieCode']);
						}
					}
                } else {       // Geen absentie code ingevukld, laat alles zien
                    $sql = "SELECT * , `leerling`.`id` as `leerlingID`  FROM `aanwezigheid` JOIN  `leerling`  on  `leerling`.`id` =  `aanwezigheid`.`leerling_id` ";
                    $sql = $sql . " JOIN  `absentie`  on  `absentie`.`id` =  `aanwezigheid`.`absentiecode`";
                }
            } else {
                $sql = "SELECT * , `leerling`.`id` as `leerlingID`  FROM `aanwezigheid` JOIN  `leerling`  on  `leerling`.`id` =  `aanwezigheid`.`leerling_id` ";
                $sql = $sql . " JOIN  `absentie`  on  `absentie`.`id` =  `aanwezigheid`.`absentiecode`";
            }


//					echo($sql);
        $conn = connectToDb();
        $result = $conn->query($sql);
		
        echo "<div id=flexboxAbsentie>";

        $vorigID = 9999999;
        while ($row = mysqli_fetch_array($result)) {
			if ($vorigID != $row['leerlingID']) {
				if ($vorigID != 9999999) {
					echo "</div >";
				}	
				echo "<div> <img id = " . $row['id'] . " src=" . $row['foto'];
                echo "  ><p id=naam >" . $row['naam'];
                echo "</p> ";
				$vorigID = $row['leerlingID'];

			}
			echo "<p>" . $row['datum'] . " om " . $row['tijd'] . " " . $row['signalering'] . " </p>\n";
		}
	echo "</div ";
?>    

	</div>
</body			
</html>
