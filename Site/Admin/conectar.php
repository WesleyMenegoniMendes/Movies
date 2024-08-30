<?php
$servername = "localhost";
$database = "librarym";
$username = "root";
$password = "";
$conexao = mysqli_connect($servername, $username, $password, $database);
if (!$conexao) {
      die("Falha na Conexão: " . mysqli_connect_error());
}
 

 
