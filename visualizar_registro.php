<?php
// Função para criar a conexão com o banco de dados
function conectarBanco()
{
    $host = "127.0.0.1";
    $usuario = "root";
    $senha = "";
    $banco = "biblioteca";

    $conn = new mysqli($host, $usuario, $senha, $banco);

    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    return $conn;
}

// Consulta para obter os registros
function consultarRegistros()
{
    $conn = conectarBanco();
    $select_query = "SELECT * FROM catraca";
    $result = $conn->query($select_query);
    $conn->close();
    return $result;
}

// Inserir registro
function inserirRegistro($id, $entrada, $saida)
{
    $conn = conectarBanco();
    $insert_query = "INSERT INTO catraca (id, entrada, saida) VALUES ('$id', '$entrada', '$saida')";

    if ($conn->query($insert_query) === TRUE) {
        echo "Registro inserido com sucesso!";
    } else {
        echo "Erro ao inserir registro: " . $conn->error;
    }

    $conn->close();
}

// Atualizar registro
function atualizarRegistro($id, $entrada, $saida)
{
    $conn = conectarBanco();
    $update_query = "UPDATE catraca SET entrada='$entrada', saida='$saida' WHERE id='$id'";

    if ($conn->query($update_query) === TRUE) {
        echo "Registro atualizado com sucesso!";
    } else {
        echo "Erro ao atualizar registro: " . $conn->error;
    }

    $conn->close();
}

// Excluir registro
function excluirRegistro($id)
{
    $conn = conectarBanco();
    $delete_query = "DELETE FROM catraca WHERE id='$id'";

    if ($conn->query($delete_query) === TRUE) {
        echo "Registro excluído com sucesso!";
    } else {
        echo "Erro ao excluir registro: " . $conn->error;
    }

    $conn->close();
}

// Processar o formulário
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["id"])) {
        $id = $_POST["id"];
        $entrada = $_POST["entrada"];
        $saida = $_POST["saida"];

        if (isset($_POST["inserir"])) {
            inserirRegistro($id, $entrada, $saida);
        } elseif (isset($_POST["atualizar"])) {
            atualizarRegistro($id, $entrada, $saida);
        } elseif (isset($_POST["excluir"])) {
            excluirRegistro($id);
        }
    }
}

// Consulta para obter os registros após a operação
$result = consultarRegistros();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/estilo-registro.css">
    <title>Página para Consultar Registros</title>



</head>

<body>
    <form method="POST">
        <div class="senai-roberto_simonsen">
            <img src="src/img/logo-senai.png" alt="">
            <p>Senai "Roberto Simonsen"</p>
            <hr>
        </div>
            <h1>REGISTROS</h1>
            <p>Insira aqui os registros, preenchendo todos os campos.</p>
        <div class="input-container">
            <input type="text" name="id" id="id" placeholder="ID" required>
            <input type="text" name="entrada" id="entrada" placeholder="Entrada" required>
            <input type="text" name="saida" id="saida" placeholder="Saída" required>
        </div>
        <div>
            <button type="submit" name="inserir">Inserir</button>
            <button type="submit" name="atualizar">Atualizar</button>
            <button class="excluir" type="submit" name="excluir">Excluir</button>
            <button onclick="window.location.href='index.php'">Voltar para a Página Principal</button>
        </div>
    </form>

    <?php if ($result->num_rows > 0) : ?>
        <div class="table-container">
            <table>
                <tbody>
                    <tr>
                        <th>ID</th>
                        <th>Entrada</th>
                        <th>Saída</th>
                    </tr>
                    <?php while ($row = $result->fetch_assoc()) : ?>
                        <tr>
                            <td><?= $row['id'] ?></td>
                            <td><?= $row['entrada'] ?></td>
                            <td><?= $row['saida'] ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    <?php else : ?>
        <p>Nenhum registro encontrado.</p>
    <?php endif; ?>
</body>

</html>