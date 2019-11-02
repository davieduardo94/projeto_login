<?php
  session_start();
  unset($_SESSION['id']); //destruindo a sessao
  header("location: index.php");//encaminhado para index
 ?>
