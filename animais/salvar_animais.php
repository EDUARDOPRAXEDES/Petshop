<?php

// Recebe os parâmetros do formulário HTML
$id = $_POST['id'];
$nome = $_POST['nome'];
$especie = $_POST['especie'];
$raca = $_POST['raca'];

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
$stmt = $conn->prepare("INSERT INTO animais (id, nome, especie, raca) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $id, $nome, $especie, $raca);
$stmt->execute();


echo "Novo registro inserido com sucesso";
echo '<a href="listar_animais.php">Ir para Listar Cadastros de Animais</a>';

// Fecha a conexão
$stmt->close();
$conn->close();
?>