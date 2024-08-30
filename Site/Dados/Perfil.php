<!-----------------------------------------------Conteúdo Lista-------------->


<!--CSS---> <link rel="stylesheet" type="text/css" href="Site/CSS/Perfil.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">



<?php



include_once("Site/dados/conectar.php");



//código para listar nome dos filmes e séries

$IDPERFIL = $_SESSION['ID'];
$sql = "SELECT * FROM user where ID = $IDPERFIL";
$resultado = mysqli_query($conexao, $sql);
$linhas = mysqli_num_rows($resultado);
$registro = mysqli_fetch_array($resultado);

$ID = $registro['ID'];
$Nome = $registro['Nome'];
$Fotos = $registro['Foto'];
$Email = $registro['Email'];
$admin = $registro['Admin'];


echo "<div id='Obras'>";



echo "<div id='Capas'>"; // CSS para modificar a capa






echo "<img src='Site/imagens/$Fotos' width='300px' height='300px''"; //Imagem do perfil


//Enviar imagem
?>

</head>
<boby>
<form method="POST" enctype="multipart/form-data" action="">
        <input name="Arquivo" type="file">         
        <button type="submit" name="Upload">Enviar</button>
        </p>
</form>
</boby>
</html>


<?php

echo "</div id='Capas'>";



echo "<div id='Informacaoes2'>"; // DIV Para estilazar o perfil
echo "<h1 class='nome'>$Nome</h1>";
echo "<p class='Email'>Email: $Email</p>";
echo "<a href='Nome.php'>Alterar Nome</a>";
echo "<p></p>";
echo "<a href='Email.php'>Alterar Email</a>";
echo "<p class='Senha'</p> <a href='senha.php'>Alterar Senha</a>";




if ($admin == 1) {
echo "<p class='Senha'</p> <a href='Site/Admin/Admin.php'>Administração</a>";


    

}


// Adicionar foto de perfil


if (isset($_FILES['Arquivo'])) {
    $Arquivo = $_FILES['Arquivo'];

    // Verificar se alguma variável está vazia
        $pasta = "Site/Imagens/Capas";
        $NomeArquivo = $Arquivo['name'];
        $NovoNomeArquivo = uniqid();
        $extensao = strtolower(pathinfo($NomeArquivo, PATHINFO_EXTENSION));
        $Capas = "Capas$NovoNomeArquivo.png";


            
        if ($Arquivo['size'] <= 6 * 1024 * 1024 && $extensao === "png") {
            $Upload = move_uploaded_file($Arquivo["tmp_name"], $pasta . $NovoNomeArquivo . "." . $extensao);

            if ($Upload) {
                // Validar o Arquivo

                $sql = "UPDATE user SET Foto = '$Capas' WHERE ID = $IDPERFIL";

                $resultado = mysqli_query($conexao, $sql);

                if ($resultado) {
                    header('Location: Perfil.php');
                } else {
                    echo "Erro ao inserir no banco de dados: " . mysqli_error($conexao);
                }

                mysqli_close($conexao);
            } else {
                header('Location: Perfil.php');
            }
        } else {
            
           echo "<div id='Notificacao'>";
            echo "Arquivo inválido! Só são aceitos imagens em PNG e com tamanho máximo de 2 MB.";
           echo "</div id='Notificacao'>";
        }
    }



echo "</div id='Informacaoes2'>";
?>

