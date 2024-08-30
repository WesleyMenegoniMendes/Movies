<html lang="PT-BR">





<!-----------------------------------------------HEAD------->
<head>    
<title>Wesley Menegoni</title>
<link rel="stylesheet" type="text/css" href="Site/CSS/LibraryLogin.css">
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>


<!-----------------------------------------------Cabeçalho------->




<!------------------------------------------------Site------->


<boby>








<div class="iNDEXLOGIN">
<center>

<div id="Form">


<form name=Cadastro action="Cadastrar.php" method="post" >
<h1>Library movie<h1>

<p><input type="text"    placeholder="Nome" name="Nome"/> </p>
<p><input type="email" placeholder="Email" name="Email"/> </p>
<p><input type="password" minlength="5" placeholder=Senha name="Senha"/> </p>
<p><input type="password" minlength="5" placeholder="Digite sua senha novamente" name="Senha2"/> </p>
<p><input type="submit" name="botao" value="Cadastrar"/> </p>


</form>


<form name=Sair action="Index.php">
<p><input type="submit" name="botao" value="Voltar"/> </p>
</form>


</div class="iNDEXLOGIN">

</center>

</boby>

<!---------------------Validação Senha------------------------------>

<script>
document.addEventListener("DOMContentLoaded", function() {
    var senha1 = document.querySelector("input[name='Senha']");
    var senha2 = document.querySelector("input[name='Senha2']");
    var form = document.querySelector("form[name='Cadastro']");
    var errorElement = document.getElementById("error-message");

    form.addEventListener("submit", function(event) {
        if (senha1.value !== senha2.value) {
            errorElement.textContent = "As senhas não coincidem. Por favor, verifique.";
            event.preventDefault();
        }
        
    });
});
</script>


<center><div id="error-message" style="color: white;"></div></center>


<!---------------------Cadastro Validação------------------------------>

<?php
include_once("Site/dados/conectar.php");

if (isset($_POST['Nome']) && isset($_POST['Senha']) && isset($_POST['Email'])) {
    $Nome = $_POST['Nome'];
    $Email = $_POST['Email'];
    $Senha = md5($_POST['Senha']);

    if (empty($Nome)) {
        echo '<center> <a style="color: white;">Por favor, preencha todos os campos obrigatórios.</a> </center>';
    } elseif (empty($Email)) {
        echo '<center> <a style="color: white;">Por favor, preencha todos os campos obrigatórios.</a> </center>';
    } elseif (empty($Senha) || $Senha == "d41d8cd98f00b204e9800998ecf8427e") {
        echo '<center> <a style="color: white;">Por favor, preencha todos os campos obrigatórios.</a> </center>';
    } else {
        $sql = "SELECT * FROM user WHERE Email = '$Email'";
        $resultado = mysqli_query($conexao, $sql);
        if (mysqli_num_rows($resultado) == 1) {
            echo '<center> <a style="color: white;">Esse email já está em uso!</a> </center>';
        } else {
            $sql = "INSERT INTO user (Nome, Email, Senha) VALUES ('$Nome', '$Email', '$Senha')";
            $resultado = mysqli_query($conexao, $sql);
            mysqli_close($conexao);
            echo "<script language='javascript' type='text/javascript'>window.location.href='index.php';</script>";
        }
    }
}
?>












