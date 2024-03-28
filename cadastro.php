<?php

require 'conexao.php';

if (isset($_POST['Enviar'])) {
    $Nome_Produto = htmlspecialchars($_POST['nome'], ENT_QUOTES, 'UTF-8');
    $Descricao_Produto = htmlspecialchars($_POST['Descricao_Produto'], ENT_QUOTES, 'UTF-8');
   $Valor_Produto = $_POST['Valor_Produto'];
   $Disponivel_Para_Venda  = htmlspecialchars($_POST['Disponivel_Para_Venda'], ENT_QUOTES, 'UTF-8');

    $query = "SELECT * FROM cadastro WHERE Nome_Produto = ?";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(1, $Nome_Produto);

    $stmt->execute();
    $result = $stmt->fetchAll();

    if (count($result) > 0) {
        echo "<script>alert(\"Produto já cadastrado\")</script>";
    } else {
        $query = "INSERT INTO cadastro (Nome_Produto, Descricao_Produto, Valor_Produto, Disponivel_Para_Venda) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(1, $Nome_Produto);
        $stmt->bindParam(2, $Descricao_Produto);
        $stmt->bindParam(3, $Valor_Produto);
        $stmt->bindParam(4, $Disponivel_Para_Venda);
        $stmt->execute();

      // Redirecionar para a página de listagem com os parâmetros via GET
      header("Location: listar_produtos.php?Nome_Produto=$Nome_Produto&Valor_Produto=$Valor_Produto");
      exit();
  }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="imagens/Iconn.png" type="image/x-icon">
    <link rel="stylesheet" href="styles.css">
    <title>Cadastro Produto</title>
  

    <script src=""></script>
</head>

<body>

    <hr>
    <div class="center">
    <script>
        hoje = new Date();
        document.write("Data e hora completa: " + hoje);
    </script> 
    <h3>Cadastro</h3>
  

    <form method="POST" action="cadastro.php">

        <p> Nome: </p>
        <input type="text" name="nome" placeholder="Nome produto" maxlength="100" required oninput="uppercaseSEN(this)">
        <br>

        <p> Descricao: </p>
        <input type="text" name="Descricao_Produto" placeholder="Descricao do Produto" maxlength="255" required>
        <br>
        <p> Valor: </p>
        <input type="text" name="Valor_Produto"  placeholder="Valor Produto" required>
        <br>

        <p>Disponível para Venda?</p>
        <select name="Disponivel_Para_Venda" required>
            <option value="">...</option>
            <option value="S">Sim</option>
            <option value="N">Não</option>
        </select>
        <br>
        <br>

        <input type="reset" value="Limpar">
        <input type="submit" value="Enviar" name="Enviar">

        <p>
        <div class="my-links">
            <a href="" target="_blank"></a>
        </div>
        <hr>
    </form>

</body>

</html>