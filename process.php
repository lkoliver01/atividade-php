<?php
session_start();
require 'index.php';

// Verificar ação
$action = $_POST['action'];

if ($action == 'add') {
    // Adicionar novo cliente
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];

    $sql = "INSERT INTO clientes (nome, email, telefone) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $nome, $email, $telefone);

    if ($stmt->execute()) {
        echo "Cliente adicionado com sucesso!";
    } else {
        echo "Erro ao adicionar cliente: " . $stmt->error;
    }

    $stmt->close();
} elseif ($action == 'edit') {
    // Editar cliente existente
    $id = intval($_POST['id']);
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];

    $sql = "UPDATE clientes SET nome = ?, email = ?, telefone = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $nome, $email, $telefone, $id);

    if ($stmt->execute()) {
        echo "Cliente editado com sucesso!";
    } else {
        echo "Erro ao editar cliente: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Ação não reconhecida.";
}

$conn->close();
?>