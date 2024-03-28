<?php

require 'conexao.php';

echo "<script>alert(\"Cadastro realizado com Sucesso!\")</script>";

$query = "SELECT Nome_Produto, Valor_Produto FROM cadastro ORDER BY Valor_Produto ASC";
$stmt = $conn->prepare($query);
$stmt->execute();
$produtos = $stmt->fetchAll();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="imagens/Iconn.png" type="image/x-icon">
    <link rel="stylesheet" href="styles.css">
    <title>Listagem de Produtos</title>
</head>

<body>
    <div class="center">
        <h3>Listagem de Produtos</h3>

        <table>
            <tr>
                <th>Nome</th>
                <th>Valor</th>
            </tr>
            <?php foreach ($produtos as $produto) : ?>
                <tr>
                    <td><?php echo $produto['Nome_Produto']; ?></td>
                    <td><?php echo $produto['Valor_Produto']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <br>
        <a href="cadastro.php">Cadastrar Novo Produto</a>
</body>

</html>