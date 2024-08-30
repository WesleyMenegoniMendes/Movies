<!-----------------------------------------------Mudar Email-------------->


<!--CSS---> <link rel="stylesheet" type="text/css" href="Site/CSS/Perfil2.css">


<?php




echo "<div id='Obras'>";
include_once("Site/dados/conectar.php");


if (isset($_POST['Email'])) {
    $IDPERFIL = $_SESSION['ID'];
    $Email = $_POST['Email'];

    // Verifique se o campo 'Email' não está vazio
    if (!empty($Email)) {
        // Verifique se o email já existe no banco de dados
        $sql_check_email = "SELECT * FROM user WHERE Email = '$Email'";
        $resultado_check_email = mysqli_query($conexao, $sql_check_email);

        if (mysqli_num_rows($resultado_check_email) == 0) {
            $sql_update_email = "UPDATE user SET Email = '$Email' WHERE ID = $IDPERFIL";
            $resultado_update_email = mysqli_query($conexao, $sql_update_email);

            if ($resultado_update_email) {
                echo "<center><a>Email atualizado com sucesso!</a></center>";
            } else {
                echo "<center><a>Erro ao atualizar o email.</a></center>";
            }
        } else {
            echo "<center><a>Esse email já está em uso!</a></center>";
        }
    } else {
        echo "<center><a>O campo de email não pode estar vazio.</a></center>";
    }
}

mysqli_close($conexao);

?>





<center>



<form name=Cadastro action="Email.php" method="post" >
<p><input type="email"    placeholder="Email" name="Email"/> </p>
<p><input type="submit" name="botao" value="Alterar"/> </p>


</form>


<form name=Sair action="Perfil.php">
<p><input type="submit" name="botao" value="Voltar"/> </p>
</form>





<?php

echo "</div id='Obras'>";

?>

<!-----------------------------------------------Mudar Email-------------->




