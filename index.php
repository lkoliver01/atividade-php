<?php
// Configurações do banco de dados
$db_server = 'localhost'; // Endereço do servidor MySQL
$db_username = 'root';    // Nome de usuário do MySQL
$db_password = '';        // Senha do MySQL
$db_database = 'cinema'; // Nome do banco de dados

// Conectar ao banco de dados
$conn = new mysqli($db_server, $db_username, $db_password, $db_database);

// Verificar conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
?>