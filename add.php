<?php
session_start();
require 'index.php';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Adicionar Cliente</title>
</head>
<body>
    <h1>Adicionar Novo Cliente</h1>
    <form action="process.php" method="post">
        <input type="hidden" name="action" value="add">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br>
        <label for="telefone">Telefone:</label>
        <input type="text" id="telefone" name="telefone" required>
        <br>
        <input type="submit" value="Adicionar">
    </form>
</body>
</html>