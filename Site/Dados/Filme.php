<!-----------------------------------------------Exibir As Listas 1-------------->


<link rel="stylesheet" type="text/css" href="Site/CSS/Categoria.css">

<?php


include_once("Site/dados/conectar.php");

$sql = "SELECT * FROM catalogo where estilo = 1 ORDER BY ID";
$resultado = mysqli_query($conexao, $sql);
$linhas = mysqli_num_rows($resultado);

echo "<div id='ObrasMargim'>";
for ($i = 0; $i < $linhas; $i++){
$registro = mysqli_fetch_array($resultado);



$Nome = $registro['Nome'];
$ID = $registro['ID'];
$Capas = $registro['Capas'];


echo "<div id='Obras'>";
echo "<center>";
echo "<a href='Obras.php?var=".$ID."'><img src='Site/imagens/$Capas' width='290px' height='427px'<a>";
echo "</center>";
echo "</div id='Obras'>";


}

echo "</div id='ObrasMargim'>";
?>









