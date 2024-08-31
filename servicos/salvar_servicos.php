<?php

// Recebe os parâmetros do formulário HTML
$id = $_POST['id'];
$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$preco = $_POST['preco'];

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
$stmt = $conn->prepare("INSERT INTO servicos (id, nome, descricao, preco) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $id, $nome, $descricao, $preco);
$stmt->execute();


echo "Novo registro inserido com sucesso";
echo '<a href="listar_servicos.php">Ir para Lista de Servicos</a>';

// Fecha a conexão
$stmt->close();
$conn->close();
?>