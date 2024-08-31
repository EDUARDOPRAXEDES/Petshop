<?php

// Recebe os parâmetros do formulário HTML
$id = $_GET['id'];


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aula1708"; 

// Cria conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Checa a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Prepara e vincula
$stmt = $conn->prepare("DELETE FROM clientes WHERE id='" . $id . "'");
$stmt->execute();


echo "Registro deletado com sucesso";
echo '<a href="listar_clientes.php">Ir para Listar Cadastros de Clientes</a>';

// Fecha a conexão
$stmt->close();
$conn->close();

// Redireciona para outra página
header("Location: http://localhost/aula1708/clientes/listar_clientes.php");
exit(); // É uma boa prática usar exit() após um redirecionamento para garantir que o script não continue a execução.
?>
