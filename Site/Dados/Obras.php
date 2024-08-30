<!-----------------------------------------------Conteúdo Lista-------------->


<!--CSS---> <link rel="stylesheet" type="text/css" href="Site/CSS/Midia.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">



<?php



include_once("Site/dados/conectar.php");



//código para listar nome dos filmes e séries

$Obras = $_GET['var'];
$sql = "SELECT * FROM catalogo where ID = $Obras";
$resultado = mysqli_query($conexao, $sql);
$linhas = mysqli_num_rows($resultado);
$registro = mysqli_fetch_array($resultado);

$ID = $registro['ID'];
$Nome = $registro['Nome'];
$Descricao = $registro['Descrição'];
$Genero = $registro['Gênero'];
$SubGenero = $registro['SubGênero'];
$Data = $registro['Data'];
$Diretor = $registro['Diretor'];
$Temporada = $registro['Temporadas'];
$Episodio = $registro['Episódios'];
$Estilo = $registro['Estilo'];
$Capas = $registro['Capas'];


echo "<div id='Obras'>";
echo "<div id='Capas'>"; // CSS para modificar a capa
echo "<img src='Site/imagens/$Capas' width='290px' height='427px''";
echo "</div id='Capas'>";
echo "<div id='Informacaoes2'>"; // DIV Para estilazar a Descrição, Data, Gênero, Diretor etc

echo "<h1 class='nome'>$Nome</h1>";
echo "<p class='descricao'>Sinopse: $Descricao</p>";
echo "<p class='data'>Data de lançamento: $Data</p>";
echo "<p class='genero'>Genêro: $Genero - $SubGenero";
echo "<p class='diretor'>Diretor: $Diretor</p>";



if ($Estilo != 1) {

    echo "<p class='Episodios'>Episódios: $Episodio</p>";
    echo "<p class='Temporadas'>Temporadas: $Temporada</p>";
    

}

echo "<p class='Listas'>Minhas Listas</p>";




///////////////////////////////Adicionar as obra a lista Programação/////////////////



$IDLISTA = $_SESSION['ID'];
include_once("Site/dados/conectar.php");

$sql = "SELECT * FROM lista WHERE ID_USUÁRIO = $IDLISTA ORDER BY ID";
$resultado = mysqli_query($conexao, $sql);
$linhas = mysqli_num_rows($resultado);
for ($i = 0; $i < $linhas; $i++){
$registro = mysqli_fetch_array($resultado);



$Lista = $registro['Nome'];
$ConteudoID = $registro['ID'];
$IDOBRA = $_GET['var'];



echo "<div id='Listas'>"; //Estilização do Botão
echo "";
echo "<form name=Adicionar action='Obras.php?var=$IDOBRA' method='post'>";
echo "<a".$ConteudoID."'>".$Lista."</a>";
echo "<div id='Adicionar'>";
echo "<td> <button name='Adicionar' type='submit'  value='".$ConteudoID."'> <img src='Site/imagens/Adicionar.png' width='14' height='14'> </button> </td>";


echo "";


echo "</div id='Adicionar'>";
echo "</div id='Listas'>";



}







echo "</center>";


// ADICIONAR A OBRA AS LISTAS

if (isset ($_POST['Adicionar'])) 
    {

$ID = $_POST['Adicionar'];


echo "Adicionado a sua lista com sucesso";


echo "</div id='Informacaoes2'>"; // DIV Para estilazar a Descrição, Data, Gênero, Diretor etc
echo "</div id='Obras'>"; // Borda externa

$sql = "INSERT INTO conteudolista (ID_LISTA,Nome) VALUES ('$ID','$Nome')";
mysqli_query($conexao, $sql);

} 




?>

