<html lang="PT-BR">





<!-----------------------------------------------HEAD------->
<head>    
<title>Wesley Menegoni</title>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="Site/CSS/LibraryLogin.css">
</head>


<!-----------------------------------------------Cabeçalho-------->




<!-----------------------------------------------Site------->


<boby>








<div class="iNDEXLOGIN">
<center>

<div id="Form">


<form action="index.php" method="post">
<h1>Library movie<h1>
<p><input type="email" width="10%" placeholder=Email name="Email"/>
<p><input type="password" placeholder=Senha name="Senha"/>
<p><input type="submit" name="botao" value="Entrar"/>
</form>

<form action="Cadastrar.php">
<input type="submit" name="botao" value="Cadastrar"/>



</div class="iNDEXLOGIN">
</boby>




<?php
include_once("Site/dados/conectar.php");
if(isset($_POST['botao'])){
session_start();
$Email = $_POST['Email'];
$Senha = md5($_POST['Senha']);




$sql = "SELECT * FROM user WHERE Email = '$Email' AND Senha = '$Senha'";


$resultado = mysqli_query($conexao,$sql);


if(mysqli_num_rows($resultado) == 1){
$registro = mysqli_fetch_array($resultado);
$_SESSION['ID'] = $registro['ID'];
$_SESSION['Nome'] = $registro['Nome'];
$_SESSION['Email'] = $registro['Email'];

header('Location: /Library%20Movies/Inicio.php');

} else{

echo "<div id='Erro'>";
echo '<a style="color: white;">Login e/ou senha incorretos</a>';
echo "</div";
echo "</div id='Form'>";

}
}
?>




