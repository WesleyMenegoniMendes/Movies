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
</head>


<!-------------------------------------------------Cabeçalho------->


<?php include 'Site/Dados/Cabeçalho.php'; ?>





<!-----------------------------------------------Site--------------->

<div class="Corpo">



<?php include 'Site/Dados/Perfil.php'; ?>




</div class="Corpo">


