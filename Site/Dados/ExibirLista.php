
<!----1--------------------------------ExibirListas---------------------------------------------------->

</link>
<link rel="stylesheet" type="text/css" href="Site/CSS/Listas.css">

<?php


include_once("Site/dados/conectar.php");

if (isset($_POST['excluir'])) {
    $IDCONTEUDO = $_POST['excluir'];
    $sql = "DELETE FROM conteudolista WHERE ID_LISTA = '$IDCONTEUDO'";
    $resultado = mysqli_query($conexao, $sql);
    
    if ($resultado) {
        $sql = "DELETE FROM lista WHERE ID = '$IDCONTEUDO'";
        $resultado = mysqli_query($conexao, $sql);
        
        if ($resultado) {
            header("Location: Lista.php");
            exit; 
        }
    }
}


?>

<!------------------------------------Titulo---------------------------------------------------->




<div id="Titulo">
<center>
<a> Minhas Listas </a>
</center>
<center>
<a1>Crie suas listas personalizadas <a1>
</center>
</div id="Titulo">


<!-----------------------------------------CriarListas------------------------------------------------->
<div id="CriarLista">
  <form name="CriarLista" action="Lista.php" method="get" onsubmit="return validarForm()">
    <input type="text" width="10%" maxlength="24" placeholder="Nome" name="CriarLista" id="nomeInput">
    <input type="submit" name="botao" value="Criar">
    <a id="erroNome" style="color: red; display: none;">Por favor, insira um nome válido(Não é permitido caracteres especiais).</a>
  </form>


<!-----------------------------------------Validar Nome------------------------------------------------->

<script src="Site/Script/Validar.js"></script>

<!-----------------------------------Adicionar a Lista no banco------------------------------------------------->

<?php




if (isset($_GET['CriarLista'])) {
  $IDLISTA = $_SESSION['ID'];
  $CriarLista = $_GET['CriarLista'];

  // Consulta para contar quantas listas o usuário já possui
  $sqlContagem = "SELECT COUNT(*) as total FROM lista WHERE ID_USUÁRIO = '$IDLISTA'";
  $resultadoContagem = mysqli_query($conexao, $sqlContagem);

  if ($resultadoContagem) {
      $row = mysqli_fetch_assoc($resultadoContagem);
      $totalListas = $row['total'];

if ($totalListas < 6) {
          // Se o usuário tem menos de 6 listas, permite a criação de uma nova lista
          $sql = "INSERT INTO lista (ID_USUÁRIO, Nome) VALUES ('$IDLISTA', '$CriarLista')";
          $resultado = mysqli_query($conexao, $sql);
          header('Location: Lista.php');
} else {
          // Se o usuário já possui 6 ou mais listas, exiba uma mensagem de erro
          echo "<a2 style='color: red; margin-top: 10%;'>Você atingiu o limite máximo de listas permitido.</a2>";
      }
  }
}

?>





<!-----------------------------------------------Exibir As Listas---------------------------------->

</div id="CriarLista">




<?php





$IDLISTA = $_SESSION['ID'];
echo "<div class='Borda'>";
include_once("Site/dados/conectar.php");
$sql = "SELECT * FROM lista WHERE ID_USUÁRIO = $IDLISTA ORDER BY ID";
$resultado = mysqli_query($conexao, $sql);
$linhas = mysqli_num_rows($resultado);
for ($i = 0; $i < $linhas; $i++){
$registro = mysqli_fetch_array($resultado);



$Lista = $registro['Nome'];
$ConteudoID = $registro['ID'];




echo "<div id='Listas'>";
echo "";
echo "<form name=Excluir action='Lista.php' method='post'>";
echo "<a href='ConteudoLista.php?var=".$ConteudoID."'>".$Lista."<a>";
echo "<div id='lixo'>";
echo "<td> <button name='excluir' type='submit'  value='".$ConteudoID."'> <img src='Site/imagens/lixo.png' width='20' height='20'> </button> </td>";
echo "</div id='lixo'>";
echo "</div id='Listas'>";

echo "";



}


echo "</div class='Borda'>";


//-----------------------------------------------Excluir--Lista----------------------------------------->







?>


</form>
</link>