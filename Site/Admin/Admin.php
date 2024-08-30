<!-----------------------------------------------Conectar no banco-------------->



<?php
session_start();
if(!isset($_SESSION['ID']))
{
header("Location: index.php");

}
include_once("conectar.php");

if (isset($_SESSION['ID'])) {
    $IDPERFIL = $_SESSION['ID'];

    $sql = "SELECT * FROM user WHERE ID = $IDPERFIL";
    $resultado = mysqli_query($conexao, $sql);
    $registro = mysqli_fetch_array($resultado);
    $Admin = $registro['Admin'];
    
        if ($Admin != 1) {
            header("Location: Perfil.php");
            exit;
        }
    }









//Validar os Arquivos

if (isset($_FILES['Arquivo'])) {
    $Arquivo = $_FILES['Arquivo'];
    $Nome = $_POST['Nome'];
    $Diretor = $_POST['Diretor'];
    $Data = $_POST['Data'];
    $Genero = $_POST['Genero'];
    $SubGenero = $_POST['SubGenero'];
    $Diretor = $_POST['Diretor'];
    $Temporadas = $_POST['Temporadas'];
    $Episodios = $_POST['Episodios'];
    $Estilo = $_POST['Estilo'];
    $descricao = $_POST['Descricao'];

    // Verificar se alguma variável está vazia
    if (empty($Nome) || empty($Diretor) || empty($Data) || empty($Genero) || empty($SubGenero) || empty($Temporadas) || empty($Episodios) || empty($Estilo) || empty($descricao)) {
        echo "Por favor, preencha todos os campos para cadastrar um filme.";
    } else {
        $pasta = "Site/Imagens/Capas";
        $NomeArquivo = $Arquivo['name'];
        $NovoNomeArquivo = uniqid();
        $extensao = strtolower(pathinfo($NomeArquivo, PATHINFO_EXTENSION));
        $Capas = "Capas$NovoNomeArquivo.png";

        if ($extensao === "png") {
            $Upload = move_uploaded_file($Arquivo["tmp_name"], $pasta . $NovoNomeArquivo . "." . $extensao);

            if ($Upload) {
                // Validar o Arquivo

                $sql = "INSERT INTO catalogo (Nome, Descrição, Data, Diretor, Gênero, SubGênero, Temporadas, Episódios, Estilo, Capas) VALUES ('$Nome','$descricao','$Data','$Diretor','$Genero','$SubGenero','$Temporadas','$Episodios','$Estilo', '$Capas' )";

                $resultado = mysqli_query($conexao, $sql);

                if ($resultado) {
                    echo "Inserção bem-sucedida no banco de dados.";
                } else {
                    echo "Erro ao inserir no banco de dados: " . mysqli_error($conexao);
                }

                mysqli_close($conexao);
            } else {
                echo "Erro ao fazer o upload do arquivo.";
            }
        } else {
            echo "Só aceito arquivos PNG.";
        }
    }
}




?>



<hrml lang="en">
<head>
    <meta charset="UFT-3>">
    <meta name="viewport" content="widht=device-widtg, initial-scale=1.0">
    <title>Admin</title> 
</head>
<boby>
<form method="POST" enctype="multipart/form-data" action="">
        <p>Capa:  <label for="Imagens">Selecione o Arquivo</label>
        <input name="Arquivo" type="file">         </p>
        <p>Nome: <input name="Nome" type="text"> </p>
        <p>Descrição: <input name="Descricao" type="text"> </p>
        <p>Data:<input name="Data" type="Date"></p>
        <p>Gênero: <input name="Genero" type="text"></p>
        <p>SubGênero: <input name="SubGenero" type="text"></p>
        <p>Diretor: <input name="Diretor" type="text"></p>
        <p>Temporadas: <input name="Temporadas" type="text"></p>
        <p>Episódios:  <input name="Episodios" type="text"></p>
        <p>Estilo: <input name="Estilo" type="text"></p>


        
<p>Tutorial Estilo (estilo anime,serie ou filme)</p>
<p>
1 - Filme
</p>
2 - Animes
<p>
3 - Series
</p>


        <button type="submit" name="Upload">Cadastrar Obra</button>
</form>
</boby>
</html>




<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário HTML</title>
</head>















