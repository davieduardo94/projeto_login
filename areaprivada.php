<?php
//verificando se a sessao existe e evitando acesso indevido.
  session_start();
  if (!isset($_SESSION['id'])) {  //se não está definido o id do usuario na sessao
    header("location:index.php");
    die();
  }
?>

<h1>Bem Vindo a sua area privada!!</h1>
<a href="sair.php">Sair</a>
