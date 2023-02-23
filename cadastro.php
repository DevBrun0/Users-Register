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
<div id="corpo-form-cad">
    <h1>Cadastrar</h1>
    <form method="POST">
        <input type="text" name="nome" placeholder="Nome Completo" maxlength="30">
        <input type="email" name="email" placeholder="Usuario" maxlength="40">
        <input type="password" name="senha" placeholder="Senha" maxlength="15">
        <input type="password" name="confsenha" placeholder="Confirmar Senha" maxlength="15">
        <input type="submit" value="Cadastrar">
        
    </form>
</div>
<?php
//verificar se clicou no botao
if(isset($_POST['nome']))
{
    $nome = addslashes($_POST['nome']);
    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);
    $confirmarSenha = addslashes($_POST['confsenha']);
    //verificar se esta preenchido
    if(!empty($nome) && !empty($email) && !empty($senha) && !empty($confirmarSenha))
    {
        $u->conectar("logintcc", "localhost", "root", "");
        if($u->msgErro == "" )//se esta tudo ok
        {
            if($senha == $confirmarSenha)
            {

                if($u->cadastrar($nome, $email, $senha))
                {
                    ?>
                     <div id="msg-sucesso">
                     Cadastrado com sucesso! Volte para entrar!
                     </div>
                    <?php
                }
                else
                {
                    ?>
                     <div class="msg-erro">
                     Email já cadastrado
                     </div>
                    <?php
                
                }
            }
            else
            {
                ?>
                <div class="msg-erro">
                Senha e confirmar senha não correspondem!
                </div>
               <?php
            }
            
        }
        else
        {
        ?>
        <div class="msg-erro">
        <?php echo"Erro: ".$u->msgErro; ?>
        </div>
        <?php
            
        }
    }
    else
    {
        ?>
        <div class="msg-erro">
        Preencha todos os campos!
        </div>
        <?php
        
    }
}

?>
</body>
</html>