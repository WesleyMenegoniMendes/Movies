<!-----------------------------------------------Exibir As Listas 1-------------->


<!--CSS---> <link rel="stylesheet" type="text/css" href="Site/CSS/Perfil2.css">


<?php




echo "<div id='Obras'>";
include_once("Site/dados/conectar.php");







?>



<!---------------------Validação Senha------------------------------>
<script>
document.addEventListener("DOMContentLoaded", function() {
var senha1 = document.querySelector("input[name='Senha']");
var senha2 = document.querySelector("input[name='Senha2']");
var form = document.querySelector("form[name='Senha']");
var errorElement = document.getElementById("error-message");

form.addEventListener("submit", function(event) {
    if (senha1.value !== senha2.value) {
errorElement.textContent = "As senhas não coincidem. Por favor, verifique.";
event.preventDefault();
} else {
errorElement.textContent = ""; 
                }
            });
        });
    </script>

<!---------------------Validação Senha------------------------------>




<?php


if (isset($_POST['Senha']) && !empty($_POST['Senha'])) {
    $AntigaSenha = md5($_POST['AntigaSenha']);
    $IDPERFIL = $_SESSION['ID'];
    $Senha = md5($_POST['Senha']);

    $sql = "SELECT * FROM user WHERE ID = '$IDPERFIL' AND Senha = '$AntigaSenha'";
    $resultado = mysqli_query($conexao, $sql);

    if (mysqli_num_rows($resultado) == 1) {
        $registro = mysqli_fetch_array($resultado);
        $sql = "UPDATE user SET Senha = '$Senha' WHERE ID = $IDPERFIL";
        $resultado = mysqli_query($conexao, $sql);
        echo "<center><a>Senha atualizada com sucesso!</a></center>";
    } else {
        echo "<div id='Erro'>";
        echo '<center><astyle="color: white;">Senha antiga incorreta!</a></center>';
        echo "</div>";
    }
} else {
    echo "<div id='Erro'>";
    echo '<a style="color: white;"><center>Por favor, preencha todos os campos!</center></a>';
    echo "</div>";
}


?>






<center>


<form name="Senha" action="Senha.php" method="post">
<p><input type="password" placeholder="Digite sua senha antiga" name="AntigaSenha"/> </p>
<p><input type="password" placeholder="Digite sua nova senha" name="Senha"/> </p>
<p><input type="password" placeholder="Digite sua senha novamente" name="Senha2"/> </p>
<p><input type="submit" name="botao" value="Alterar"/> </p>
</form>

 <form name="SairForm" action="Perfil.php">
 <p><input type="submit" name="botao" value="Voltar"/> </p>
</form>


<div id="error-message" style="color: red;"></div>







</div id='Obras'>;


<!-----------------------------------------------Exibir As Listas 2-------------->





