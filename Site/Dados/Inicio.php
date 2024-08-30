<!-----------------------------------------------Exibir As Listas 1-------------->

<link rel="stylesheet" type="text/css" href="Site/CSS/Inicio.css">

<?php


include_once("Site/dados/conectar.php");

$sql = "SELECT * FROM catalogo ORDER BY ID";
$resultado = mysqli_query($conexao, $sql);
$linhas = mysqli_num_rows($resultado);

echo "<div id='ObrasMargim'>";
for ($i = 0; $i < $linhas; $i++){
$registro = mysqli_fetch_array($resultado);



$Nome = $registro['Nome'];
$Capas = $registro['Capas'];
$ID = $registro['ID'];


echo "<div id='Obras'>";
echo "<center>";
echo "<a href='Obras.php?var=".$ID."'><img src='Site/imagens/$Capas' width='290px' height='427px'<a>";
echo "</center>";
echo "</div id='Obras'>";


}

echo "</div id='ObrasMargim'>";
?>




<!-----------------------------------------------Exibir As Listas 2-------------->





