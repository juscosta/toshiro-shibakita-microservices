<?php
$servername = getenv('DB_HOST') ?: 'mysql';
$username   = getenv('DB_USER') ?: 'root';
$password   = getenv('DB_PASS') ?: 'Senha123';
$database   = getenv('DB_NAME') ?: 'meubanco';

$link = new mysqli($servername, $username, $password, $database);

if ($link->connect_errno) {
  http_response_code(500);
  echo 'Erro ao conectar no banco: ' . $link->connect_error;
  exit();
}

$valor_rand1 = rand(1, 999);
$valor_rand2 = strtoupper(substr(bin2hex(random_bytes(4)), 0, 8));
$host_name   = gethostname();

$stmt = $link->prepare('INSERT INTO dados (AlunoID, Nome, Sobrenome, Endereco, Cidade, Host) VALUES (?, ?, ?, ?, ?, ?)');
$stmt->bind_param('isssss', $valor_rand1, $valor_rand2, $valor_rand2, $valor_rand2, $valor_rand2, $host_name);

if ($stmt->execute()) {
  echo 'Registro criado com sucesso! Host: ' . $host_name;
} else {
  http_response_code(500);
  echo 'Erro ao inserir: ' . $stmt->error;
}

$stmt->close();
$link->close();
?>