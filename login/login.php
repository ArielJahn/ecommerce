<?php
include('entrada.php');

if(isset($_POST['login'])){

    if(strlen($_POST['usuario']) == 0){
        echo "Preencha seu usuário";
    } else if(strlen($_POST['senha'] == 0)){
        echo "Preencha sua senha"; 
    } else {
        $usuario = $mysqli->real_escape_string($_POST['usuario']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND senha= '$senha'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

        $quantidade = $sql_query->num_rows; 

        if($quantidade == 1) {
            
            $usuario = $sql_query->fetch_assoc();
            
            if(!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];

            header("Location: loja.php");

        } else {
            echo "Falha ao logar! E-mail ou senha incorretos";
        }

    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="css.css">
</head>
<body>
    <form action="" method="POST">
<div class="container mt-5">    
    <div class="row d-flex justify-content-center">
        <div class="col-md-6">
            <div class="card px-5 py-5" id="form1">
                <div class="form-data" v-if="!submitted">
                    <div class="forms-inputs mb-4"> <span>Nome de usuário</span> <input autocomplete="off" type="text" name="usuario" v-model="email" v-bind:class="{'form-control':true, 'is-invalid' : !validEmail(email) && emailBlured}" v-on:blur="emailBlured = true">
                        <div class="invalid-feedback">O usuário não é válido!</div>
                    </div>
                    <div class="forms-inputs mb-4"> <span>Senha</span> <input autocomplete="off" type="password" v-model="password" name="senha" v-bind:class="{'form-control':true, 'is-invalid' : !validPassword(password) && passwordBlured}" v-on:blur="passwordBlured = true">
                        <div class="invalid-feedback">Password must be 8 character!</div>
                    </div>
                    <div class="mb-3"> <button v-on:click.stop.prevent="submit" name="login" class="btn btn-dark w-100">Login</button> </div>
                </div>
            </div>
        </div>
    </div>
</div>
    </form>
</body>
</html>

