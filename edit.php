<?php
session_start();
require 'index.php';

// Verificar se o ID foi passado
if (!isset($_GET['id'])) {
    die("ID do cliente não fornecido.");
}

$id = intval($_GET['id']);

// Buscar o cliente com o ID fornecido
$sql = "SELECT id, nome, email, telefone FROM clientes WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    die("Cliente não encontrado.");
}

$cliente = $result->fetch_assoc();

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Cliente</title>
</head>
<body>
    <h1>Editar Cliente</h1>
    <form action="process.php" method="post">
        <input type="hidden" name="action" value="edit">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($cliente['id']); ?>">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($cliente['nome']); ?>" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($cliente['email']); ?>" required>
        <br>
        <label for="telefone">Telefone:</label>
        <input type="text" id="telefone" name="telefone" value="<?php echo htmlspecialchars($cliente['telefone']); ?>" required>
        <br>
        <input type="submit" value="Salvar">
    </form>
</body>
</html>