<?php
session_start();

// Importa a classe Contato
require 'Contato.class.php';

// Cria um objeto da classe Contato e conecta ao banco de dados
$conecta = $contato = new Contato();

if (!$conecta) {
    echo "<h1>Erro ao conectar ao banco de dados</h1>";
    //exit;
} else {

    $nome  = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Se o usuário clicar no botão os dados
    // passam para o método POST e posteriormente para
    // váriaveis locais
    if (isset($_POST['btnEntrar'])) {

        // Teste unitario
        // echo "Nome $nome, Email $email, Senha $senha";

        // Autentica os campos com o banco de dados
        $user = $contato->chkUser($email);
        if ($user) {
            $user = $contato->chkUserPass($email, $senha);
            if (!empty($user)) {
                $_SESSION['nome'] = $user['nome'];
                header('location: pagina2.php');
            } else {
                echo "<scripts>
                            alert('Usuário ou Senha inválidos')
                            </scripts>";
                exit;
            }
        } else {
            echo "<scripts>
                        alert('Usuário não encontrado. Crie uma conta')
                 </scripts>";
        }
    } else {
        if (isset($_POST['btnCadastrar'])) {
            $user = $contato->chkUser($email);
            if ($user) {
                echo "E-mail já cadastrado";
            } else {
                $contato->insertUser($nome, $email, $senha);
                
            }
        }
    }
}
