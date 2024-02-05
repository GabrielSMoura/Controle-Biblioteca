<?php

// Conexão com o nosso Banco
$host = "127.0.0.1";
$usuario = "root";
$senha = "";
$banco = "biblioteca";

$conn = new mysqli($host, $usuario, $senha, $banco);

// Verificador de Conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Inserção dos Dados
$data_hora = date("Y-m-d H:i:s");
$insert_query = "INSERT INTO catraca (entrada) VALUES ('$data_hora')";

// Executando o comando de inserção
if ($conn->query($insert_query) === TRUE) {
    echo "Dados inseridos com sucesso!<br>";
} else {
    echo "Erro ao inserir dados: " . $conn->error . "<br>";
}

// Atualização dos Dados
$update_query = "UPDATE catraca SET saida = '$data_hora' WHERE id = 1";

// Executando o comando de atualização
if ($conn->query($update_query) === TRUE) {
    echo "Dados atualizados com sucesso!<br>";
} else {
    echo "Erro ao atualizar dados: " . $conn->error . "<br>";
}

// Exclusão de Dados
$delete_query = "DELETE FROM catraca WHERE id = 2";

// Executando o comando de exclusão
if ($conn->query($delete_query) === TRUE) {
    echo "Dados excluídos com sucesso!<br>";
} else {
    echo "Erro ao excluir dados: " . $conn->error . "<br>";
}

// Fechando a conexão
$conn->close();
?>

