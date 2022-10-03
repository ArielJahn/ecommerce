<!DOCTYPE html>
<html>
<title>Lojinha</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
<body>

<!-- lateral/categorias -->
<div class="w3-sidebar w3-bar-block w3-border-right" style="display:none" id="mySidebar">
  <button onclick="w3_close()" class="w3-bar-item w3-large">Fechar &times;</button>
  <a href="loja.php" class="w3-bar-item w3-button">Página principal</a>
  <?php
  include('conexao.php');
  $sqlcategoria = "SELECT * FROM categorias";
  $sqlcategoria_acesso = $conn->query($sqlcategoria);
  $categorias = $sqlcategoria_acesso->fetchAll(PDO::FETCH_ASSOC);

  foreach($categorias as $categoria){
    echo '<a href="#" class="w3-bar-item w3-button">' . $categoria['descricao'] . '</a>';
  }
  ?>
</div>

<!-- Page Content -->
<div class="w3-teal">
  <button class="w3-button w3-teal w3-xlarge" onclick="w3_open()">☰</button>
  <div class="w3-container">
    <h1>Lojinha
     
      <button type="button" class="btn btn-light"><a href="carrinho.php" class="w3-bar-item w3-button">Carrinho</a></button>
     
    </h1>
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


// foreach(Array $aVetor as $valor)
//echo [0]['resumo']
 foreach($produtos as $produto){
  if(isset($_POST[$produto['id']])){
  echo $_POST[$produto['id']];
  $sql = "INSERT INTO carrinho(id, descricao,caracteristicas,valor,estoque,resumo)
  values (:id, :descricao, :caracteristicas, :valor, :estoque, :resumo)";
  $consulta = $conn->prepare($sql);
  $resultado = $consulta->execute(array("id" => $produto['id'],
  "descricao" => $produto['descricao'],
  "caracteristicas" => $produto['caracteristicas'],
  "valor" => $produto['valor'],
  "estoque" => $produto['estoque'],
  "resumo" => $produto['resumo']));
 }
    // $produto[0]
      echo("ID: " . $produto['id'] . '<br>');
      echo("Descrição: " . $produto['descricao'] . '<br>');
      echo("Características: " . $produto['caracteristicas'] . '<br>');
      echo("Valor: " . $produto['valor'] . '<br>');
      echo("Estoque: " . $produto['estoque'] . '<br>');
      echo("Resumo: " . $produto['resumo'] . '<br>');
      echo ('<form method="post">
               <input type="submit" value="'. $produto['id'] .'" name="'. $produto['id'] .'" class="btn btn-success">Comprar</input>
            </form>      
            <br><br><br>');
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
