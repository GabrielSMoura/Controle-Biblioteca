<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Programa de Controle para Biblioteca do Senai</title>
    <link rel="stylesheet" href="src/estilo.css">
</head>
<body>
    <div class="container">
        <div class="login form">
            <header>
                <img src="src/img/logo-senai.png" alt="">
                <h1>Controle de Entrada e Saída</h1>
                <p>Biblioteca</p>
            </header>
            <form id="myForm" action="visualizar_registro.php" method="POST">
                <label for="id">ID:</label>
                <input type="text" id="id" name="id" class="form-input" placeholder="ID" required>

                <label for="entrada">Entrada:</label>
                <input type="text" id="entrada" name="entrada" class="form-input" placeholder="Entrada" required>

                
                <label for="saida">Saída:</label>
                <input type="text" id="saida" name="saida" class="form-input" placeholder="Saída">
                
                <input type="submit" class="button" value="Visualizar Registros">
            </form>
        </div>
    </div>
</body>
</html>
