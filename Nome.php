<html lang="PT-BR">



<!-------------------------------------Session--------------------------------------->
<?php
session_start();
if(!isset($_SESSION['ID']))
{
header("Location: index.php");

}
?>



<!-----------------------------------------------HEAD------->
<head>    
<title>Wesley Menegoni</title>
<link rel="stylesheet" type="text/css" href="Site/CSS/Library.css">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>


<!-------------------------------------------------Cabeçalho------->







<!-----------------------------------------------Site--------------->

<div class="Corpo">



<?php include 'Site/Dados/Nome.php'; ?>




</div class="Corpo">


