<html lang="PT-BR">


<?php
session_start();
if(!isset($_SESSION['ID']))
{
header("Location: index.php");

}
?>


<head>    
<title>Wesley Menegoni</title>
<link rel="stylesheet" type="text/css" href="Site/CSS/Library.css">
</head>


<?php include 'Site/Dados/Cabeçalho.php'; ?>


<!------------------------------------------------Site------------------------->

<div class="Corpo">


<?php include 'Site/Dados/ConteúdoLista.php'; ?>



</div class="Corpo">


