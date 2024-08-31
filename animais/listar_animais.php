<?php
$servername = "localhost";
$username = "root"; // Altere para o seu usuário MySQL
$password = ""; // Altere para a sua senha MySQL
$dbname = "aula1708"; // Altere para o nome do seu banco de dados

// Cria conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Checa a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Consulta SQL para selecionar todos os registros
$sql = "SELECT id, nome, especie, raca FROM animais";
$result = $conn->query($sql);

// Exibe a tabela HTML
echo "<!DOCTYPE html>
<html lang='pt-BR'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Lista de Animais</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            color: #fff;
            background-color: #007bff;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s;
        }
        .button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <a href=\"/aula1708\" class=\"button\">Voltar</a>
    <a href=\"cadastro_animais.html\" class=\"button\">Cadastrar Animais</a>
    <h2>Lista de Animais</h2>";

if ($result->num_rows > 0) {
    echo "<table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Espécie</th>
                    <th>Raça</th>
                    <th>Ação</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>";

    // Saída dos dados de cada linha
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . htmlspecialchars($row["id"]) . "</td>
                <td>" . htmlspecialchars($row["nome"]) . "</td>
                <td>" . htmlspecialchars($row["especie"]) . "</td>
                <td>" . htmlspecialchars($row["raca"]) . "</td>
                <td><a href=\"deletar_animais.php?id=". htmlspecialchars($row["id"])."\">Excluir</a></td>
                <td><a href=\"alterar_animais.php?id=". htmlspecialchars($row["id"])."\">Alterar</a></td>
              </tr>";
    }

    echo "  </tbody>
        </table>";
} else {
    echo "0 resultados";
}

echo "</body>
</html>";

// Fecha a conexão
$conn->close();
?>
