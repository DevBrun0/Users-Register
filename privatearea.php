<?php
session_start();
if(!isset($_SESSION['id_usuario']))
{
    header("location: index.php");
    exit;
}
?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Area Privada</title>
    <script type="text/javascript" src="teste.js"></script>
    <link rel="stylesheet" type="text/css" href="privatearea.css">
</head>
<body>
<div id="corpo-form">
    <h1>Obrigado realizar o login</h1>
    <h2>Click no botão para voltar para a pagina inicial</h2>
    <form method="POST">
    <button><a onclick="Enviar()" href="..\index.html">Click para voltar</a></button>
    </form>
</div>

</body>
</html>