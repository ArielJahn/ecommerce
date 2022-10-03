<?php
include('conexao.php');

$sqlcarrinho = "SELECT * FROM carrinho";
$sqlcarrinho_acesso = $conn->query($sqlcarrinho);
  $carrinhos = $sqlcarrinho_acesso->fetchAll(PDO::FETCH_ASSOC);

  foreach($carrinhos as $carrinho){
echo("ID: " . $carrinho['id'] . '<br>');
echo("Descrição: " . $carrinho['descricao'] . '<br>');
echo("Características: " . $carrinho['caracteristicas'] . '<br>');
echo("Valor: " . $carrinho['valor'] . '<br>');
echo("Estoque: " . $carrinho['estoque'] . '<br>');
echo("Resumo: " . $carrinho['resumo'] . '<br>');
echo '<a href="apaga.php?id='.$carrinho['id'].'">Apagar</a> <br><br><br>';
  }
  echo '<a href="loja.php">Voltar</a>';
?>