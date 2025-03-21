<link rel="stylesheet" href="">
<?php
require 'Contato.class.php';

$conecta = $contato = new Contato();

if( !$conecta ){
    echo "<h1>Erro ao conectar ao banco de dados</h1>";
    //exit;
}else{
    if($_POST['nome']){
     $nome = $_POST['nome'];
     $email = $_POST['email'];
     $senha = $_POST['senha'];
}else{
    echo "nao veio";
}
    echo "Nome $nome, Email $email, Senha $senha";
}



