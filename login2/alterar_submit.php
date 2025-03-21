<?php
include "Contato.class.php";
$conecta = $contato = new Contato();

if(!$conecta){
    echo "<script>
    alert('Falha ao conectar com o banco. Tente mais tarde')
    window.location.href = 'sair.php'/
    </script>";
}else{
    if(!empty($_POST['id'])){

        $nome = $_POST ['nome'];
        $email = $_POST ['email'];
        $senha = $_POST ['senha'];
        $id = $_POST ['id'];

        if(!empty($nome) && !empty($email) && !empty($senha)){
            $contato->editar($id, $nome, $email, $senha);
        }
        header("location:contatos.php");
    }
}