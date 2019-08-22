<?php
  session_start();
  unset($_SESSION['id_usuario']); //destruindo a sessao
  header("location: index.php");//encaminhado para index
 ?>
