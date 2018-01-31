<?php
session_start();
require_once './connection.php';
$naam 			= 	$_REQUEST['naam'];
$adres      	=	$_REQUEST['adres'];
$woonplaats		=	$_REQUEST['woonplaats'];
$tel			=	$_REQUEST['tel'];
$telnood		=	$_REQUEST['telnood'];
$telouders		=	$_REQUEST['telouders'];
$foto			=	"fotoos/default.jpg";
$klas			=	$_REQUEST['klas'];
$schermvolgnr	=	berekenSchermVolgnr($klas);

// In PHP versions earlier than 4.1.0, $HTTP_POST_FILES should be used instead
// of $_FILES.
//C:\xampp\htdocs\lrs\fotoos
//var_dump($_FILES);

$uploaddir = 'fotoos/';
$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
//echo "uploadfile";
//echo $uploadfile;
//echo '<pre>';
if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
//    echo "File is valid, and was successfully uploaded.\n";
} else {
//    echo "Possible file upload attack!\n";
}

//echo 'Here is some more debugging info:';
//print_r($_FILES);

//print "</pre>";


$foto = $uploadfile;

//echo $foto;



$conn 	= connectToDb();
$sql = "SELECT *   FROM `leerling`  where `naam` = '$naam' ";
$result = $conn->query($sql);

if ( $result->num_rows  == 0 ) {
	$schermvolgnr	=	berekenSchermVolgnr($klas);	
//	$foto			=	"fotoos/default.jpg";

	$sql = "INSERT INTO `leerling`(`naam`, `adres`, `woonplaats`, `tel`, `telnood`, `telouders`, `foto`, `schermvolgnr`, `klas`) "
		   . "VALUES ( '$naam', '$adres' , '$woonplaats' , '$tel' , '$telnood' , '$telouders' , '$foto','$schermvolgnr','$klas') "; 		
//	echo($sql);
	$conn              = connectToDb();
	$result            = $conn->query($sql);
	}

    header("Location: HTMLPage1.php");


	
function berekenSchermVolgnr($par_klas){
	$conn = connectToDb();
	$sql = "SELECT MAX(schermvolgnr) AS maxSchermVolgnr FROM leerling where `klas` = ".$par_klas;
	$result = $conn->query($sql);
	if ($result) {
		$row = mysqli_fetch_array($result) ;
		if (isset($row['maxSchermVolgnr'])) {
			$eruit = $row['maxSchermVolgnr'];
			$eruit = $eruit + 1;
		} else	{
			$eruit = 1;
		}
	}	else	{
		$eruit = 1;
	}
	$conn->close();
return($eruit);
}
?>      
