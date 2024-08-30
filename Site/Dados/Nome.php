<!-----------------------------------------------Exibir As Listas 1-------------->


<!--CSS---> <link rel="stylesheet" type="text/css" href="Site/CSS/Perfil2.css">


<?php




echo "<div id='Obras'>";
include_once("Site/dados/conectar.php");


if (isset($_POST['Nome'])) {
    $IDPERFIL = $_SESSION['ID'];
    $Nome = $_POST['Nome'];

    // Verifique se o campo 'Nome' não está vazio
    if (!empty($Nome)) {
        $sql = "UPDATE user SET Nome = '$Nome' WHERE ID = $IDPERFIL";
        $resultado = mysqli_query($conexao, $sql);
        echo "<center><a>Nome atualizado com sucesso!</a></center>";
    } else {
        echo "<center><a>O campo não pode estar vazio.</a></center>";
    }
}

?>





<center>



<form name=Cadastro action="Nome.php" method="post" >
<p><input type="text"    placeholder="Nome" name="Nome"/> </p>
<p><input type="submit" name="botao" value="Alterar"/> </p>


</form>


<form name=Sair action="Perfil.php">
<p><input type="submit" name="botao" value="Voltar"/> </p>
</form>





<?php

echo "</div id='Obras'>";

?>

<!-----------------------------------------------Exibir As Listas 2-------------->





