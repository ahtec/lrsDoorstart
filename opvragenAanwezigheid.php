<?php
session_start();
require_once './connection.php';
require_once './functiesPHP.php';
include_once 'header.php';
?>
<html>
    <head>
        <script src="lrsscript.js"></script>
        <link rel="stylesheet" type="text/css" href="opmaaklrs.css">   
        <meta charset="utf-8" />
        <title> Leerlingen Registratie Systeem </title>
    </head>
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

        .GroupAanwezigheid	{
            /*display: inline-block;*/
            /*<!----    background: linear-gradient(rgba(128,128,128,0.3), rgba(0,0,128,0.7));*/  
            /*---->*/
            overflow: hidden;
            text-overflow: ellipsis;
            border: 1px solid white;
            border-radius: 10px;
            width: 24%;
            margin: 5px;
            object-fit: contain;
        }


    </style>

    <body>
        <?php
        echo "<div class='topnav' >" . createButons("test");
        echo "<a href=  opvragenAanwezigheid.php?absentieCode=999 >Afwezig</a>";
        echo "</div>";
        ?>   
        <div  class="klas">
            <?php
            if ($_REQUEST) {
                if (isset($_REQUEST['absentieCode'])) {
                    if ($_REQUEST['absentieCode'] == "999") {
                        $sql = "SELECT * , `leerling`.`id` as `leerlingID`  FROM `aanwezigheid` JOIN  `leerling`  on  `leerling`.`id` =  `aanwezigheid`.`leerling_id` ";
                        $sql = $sql . " JOIN  `absentie`  on  `absentie`.`id` =  `aanwezigheid`.`absentiecode`";
                        $sql .= " where `signalering` <> 'Aanwezig' ";
                    } else {
                        $sql = "SELECT * , `leerling`.`id` as `leerlingID`  FROM `aanwezigheid` JOIN  `leerling`  on  `leerling`.`id` =  `aanwezigheid`.`leerling_id` ";
                        $sql = $sql . " JOIN  `absentie`  on  `absentie`.`id` =  `aanwezigheid`.`absentiecode`";
                        $sql .= sprintf(" where `signalering` ='%s' ", $_REQUEST['absentieCode']);
                    }
                } else {
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
            echo "<table>";

            $rijTeller = 0;

            $vorigID = 9999999;
            while ($row = mysqli_fetch_array($result)) {
                if ($vorigID != $row['leerlingID']) {
                    if ($vorigID != 9999999) {
//                        echo "</div >";
                        echo "</td>";
                    }
                    echo "\n";
                    $rijTeller++;
                    if ($rijTeller > 4) {
                        $rijTeller = 1;
                        echo "</tr>";
                    }
                    if ($rijTeller == 1) {
                        echo "<tr>";
                    }
                    echo " <td class='GroupAanwezigheid' id='afbContainer'> ";
                    echo "<img id = " . $row['id'] . " src=" . $row['foto'] . " width=100px  > \n";
                    echo "<p id=naam  class='leerling'>" . $row['naam'] . " </p> ";
                    $vorigID = $row['leerlingID'];
                }
                echo "<p>" . $row['datum'] . " om " . $row['tijd'] . " " . $row['signalering'] . " </p>\n";
            }
//            echo "</div ";
            echo "</td>";
            ?>    

        </div>
    </body			

