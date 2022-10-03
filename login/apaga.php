<?php
include('conexao.php');

if(isset($_GET['id'])){
    echo $_GET['id'];   
    $sqldelete = 'DELETE FROM carrinho WHERE id = :id';
    $consulta = $conn->prepare($sqldelete);
    $resultado = $consulta->execute(["id" => $_GET['id']]);
    header('Location: carrinho.php');
}
?>