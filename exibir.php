<?php
session_start();
require 'index.php';
// Consultar dados 
/*$sql = "SELECT id, nome, email, telefone FROM clientes";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Exibir dados de cada linha
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Nome</th><th>Email</th><th>Telefone</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["nome"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["telefone"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "0 resultados";
}

// Fechar conexão
$conn->close();
*/

$sql = "SELECT id, nome, email, telefone FROM clientes";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LudoFachion</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Clientes</h1>

    <!-- Botão para adicionar novo cliente -->
    <a href="add.php" style="margin-bottom: 20px; display: inline-block;">Adicionar Novo Cliente</a>

    <?php
    if ($result->num_rows > 0) {
        // Exibir dados de cada linha
        echo "<table>";
        echo "<tr><th>ID</th><th>Nome</th><th>Email</th><th>Telefone</th><th>Ações</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["nome"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["telefone"] . "</td>";
            echo "<td class='action-buttons'>";
            echo "<a href='edit.php?id=" . $row["id"] . "'>Editar</a>";
            echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "0 resultados";
    }

    // Fechar conexão
    $conn->close();
    ?>
</body>
</html>