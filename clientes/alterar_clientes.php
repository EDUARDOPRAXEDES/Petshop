<?php

// Recebe os parâmetros do formulário HTML
$id = $_GET['id']; // Certifique-se de validar e sanitizar os parâmetros recebidos
$novo_nome = $_POST['nome']; // Exemplo de campo do formulário
$nova_descricao = $_POST['descricao']; // Exemplo de campo do formulário

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
$stmt = $conn->prepare("UPDATE clientes SET nome = ?, descricao = ? WHERE id = ?");
$stmt->bind_param("ssi", $novo_nome, $nova_descricao, $id);

// Executa a atualização
if ($stmt->execute()) {
    echo "Registro atualizado com sucesso";
} else {
    echo "Erro ao atualizar o registro: " . $stmt->error;
}

echo '<a href="listar_clientes.php">Ir para Listar Cadastros de listar_clientes</a>';

// Fecha a conexão
$stmt->close();
$conn->close();

// Redireciona para outra página
header("Location: http://localhost/aula1708/clientes/listar_clientes.php");
exit(); // É uma boa prática usar exit() após um redirecionamento para garantir que o script não continue a execução.
?>
