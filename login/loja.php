<!DOCTYPE html>
<html>
<title>Lojinha</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>

<!-- Sidebar -->
<div class="w3-sidebar w3-bar-block w3-border-right" style="display:none" id="mySidebar">
  <button onclick="w3_close()" class="w3-bar-item w3-large">Fechar &times;</button>
  <a href="#" class="w3-bar-item w3-button">Página principal</a>
  <a href="#" class="w3-bar-item w3-button">Link 2</a>
  <a href="#" class="w3-bar-item w3-button">Link 3</a>
</div>

<!-- Page Content -->
<div class="w3-teal">
  <button class="w3-button w3-teal w3-xlarge" onclick="w3_open()">☰</button>
  <div class="w3-container">
    <h1>Lojinha</h1>
  </div>
</div>

<div class="w3-container">
<h3>Produtos em Destaque</h3>

<?php 
include('conexao.php');

  $sqlproduto = "SELECT * FROM produtos";
  //sqlluan retorna pdo
  $sqlluan = $conn->query($sqlproduto);
  $produtos = $sqlluan->fetchAll(PDO::FETCH_ASSOC);

 // echo $produto['resumo'];
  $vetor = array();

// foreach(Array $aVetor as $valor)
//echo [0]['resumo']
 foreach($produtos as $produto){
    // $produto[0]
      echo($produto['id'] . '<br>');
      echo($produto['descricao'] . '<br>');
      echo($produto['caracteristicas'] . '<br>');
      echo($produto['valor'] . '<br>');
      echo($produto['estoque'] . '<br>');
      echo($produto['imagem'] . '<br>');
      echo($produto['resumo'] . '<br><br><br><br>');
      
 }
?>  
</div>

<script>
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
}

function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
}
</script>
     
</body>
</html> 
