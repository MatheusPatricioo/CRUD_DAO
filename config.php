<?php

// Conexão com o banco de dados
$db_name = 'test'; // Nome do banco de dados
$db_host = 'localhost'; // Endereço do servidor do banco de dados
$db_user = 'root'; // Usuário do banco de dados
$db_pass = ''; // Senha do banco de dados


// Cria uma conexão PDO com o banco de dados MySQL
$pdo = new PDO("mysql:dbname=" . $db_name . ";host=" . $db_host, $db_user, $db_pass);
