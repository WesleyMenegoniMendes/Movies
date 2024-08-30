<!-----------------------------------------------Conteúdo Lista-------------->


<link rel="stylesheet" type="text/css" href="Site/CSS/ConteúdoLista.css">




<?php



include_once("Site/dados/conectar.php");





// Codigo para verificar se o acesso do usuário a lista é valido

$var = $_GET["var"];
$IDLISTA = $_SESSION['ID'];


echo "<form name='ConteudoLista' action='ConteudoLista.php?var=".$var."' method='post'>";
$sql = "SELECT * FROM lista WHERE ID = $var AND ID_USUÁRIO = $IDLISTA";
$resultado = mysqli_query($conexao, $sql);
$registro = mysqli_fetch_array($resultado);
$confirmado = $registro['ID_USUÁRIO']; //Achar o ID do usuário
$ListaNome2 = $registro['Nome']; // Achar o nome da Lista

if ($confirmado != $IDLISTA) 
{ 

header('Location: Inicio.php');

}






// Titulo com o nome da lista

echo "<div id='Titulo'>";
echo "<center>";
echo "<a1>$ListaNome2 </a1>";
echo "</center>";
echo "</div id='Titulo'>";



//código para listar nome dos filmes e séries

$ListaNome = $_GET['var'];

$sql = "SELECT * FROM conteudolista where ID_LISTA = $ListaNome ORDER BY ID";
$resultado = mysqli_query($conexao, $sql);
$linhas = mysqli_num_rows($resultado);


echo "<div id='Obras'>";
for ($i = 0; $i < $linhas; $i++){
$registro = mysqli_fetch_array($resultado);

$Nome = $registro['Nome'];
$ID = $registro['ID'];

$numeroItem = $i + 1; //Adicionar Números

echo "<div id='Nome'>";
echo "<center>";
echo "$numeroItem   $Nome";

echo "</center>";
echo "</div id='Nome'>";


//código para deletar do servidor

if (isset ($_POST['excluir'])) 
{

$IDCONTEUDO = $_POST['excluir']; 
$sql = "DELETE FROM conteudolista WHERE ID = '$IDCONTEUDO'";
$resultado = mysqli_query($conexao, $sql);
if($resultado)
echo '<script>window.location = "ConteudoLista.php?var=' . $ListaNome . '";</script>';
exit();
}



//código para apagar um da lista

echo "<div id='Lixo'>";
echo "<td> <button name='excluir' type='submit'  value='".$ID."'> <img src='Site/imagens/lixo.png' width='20' height='20'> </button> </td>";
echo "</div id='Lixo'>";



}

//código para sair da aba das listas
echo "<div id='Sair'>";
echo "<a href='Lista.php' ><img src='Site/imagens/sair.png' width='20' height='20'> </a>";
echo "</div id='Sair'>";


echo "</div id='Obras'>";



?>




<!-----------------------------------------------Conteúdo Lista-------------->





