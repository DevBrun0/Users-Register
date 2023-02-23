<?php
require_once 'Class/usuarios.php';
    $u = new Usuario;
?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projeto Login Tcc</title>
    <link rel="stylesheet" type="text/css" href="loginstyle.css">
</head>
<body>
<div id="corpo-form">
    <h1>Entrar</h1>
    <form method="POST">
        <input type="email" placeholder="Usuario" name="email">
        <input type="password"  placeholder="Senha" name="senha">
        <input type="submit" value="Acessar">
        <a href="cadastro.php">Ainda não está inscrito?<strong>Cadastre-se</strong></a>
    </form>
</div> 

<?php
if(isset($_POST['email']))
{
    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);
    
    if(!empty($email) && !empty($senha))
    {
        $u->conectar("logintcc", "localhost", "root", "");
    if($u->msgErro == "")
     {


        if($u->logar($email, $senha))
        {
            header("location: privatearea.php");
        }
        else
        {
            ?>
            <div class="msg-erro">
            Email e/ou senha estão incorretos!
            </div>
            <?php
        }
    }   
    else{
        ?>
        <div class="msg-erro">
        <?php  echo "Erro ".$u->msgErro;?>
        </div>
        <?php
    }
    }
    else
    {
        ?>
        <div class="msg-erro">
        Preencha todos os campos
        </div> 
        <?php
    }
}
?>

</body>
</html>