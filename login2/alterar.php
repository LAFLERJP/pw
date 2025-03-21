<?php

require "Contato.class.php";

$conecta = $contato = new Contato();

if(!$conecta){
    echo "<script>
    alert('Falha ao conectar com o banco. Tente mais tarde')
    window.location.href = 'sair.php'/
    </script>";
}else{
    if($_GET['id'])
    $email = $_GET['id'];
$info=$contato->chkUser($email);
}

?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Login</title>
    <link rel="stylesheet" href="css/estilo.css">
    
</head>
<body>
    
    <form action="alterar_submit.php" method="POST" class="container">
        <div class="box">
            <h1>Ateração de Dados</h1>
            <input type="hidden" name = "id" value = <?php echo $info['id']; ?> >

            <input type="text"      name="nome"   value = <?php echo $info['nome']; ?> >
            <input type="text"      name="email"  value = <?php echo $info['email']; ?> > 
            <input type="password"  name="senha"  value = <?php echo $info['senha']; ?> >  

           <button name = "btnAlterar" class = "criar">Atualizar Dados</button>
        </div>


    </form>

</body>
</html>










































}
    

