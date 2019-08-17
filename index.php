<?php
  require_once 'classes/usuarios.php';
  $u = new Usuario;
  ini_set("error_log", "D:/xampp/htdocs/ProjetoPHP/php-error.log");
  error_log( "POST: " . print_r($_POST, true) );
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet"  href="css/estilo.css">
	<title>Projeto Login</title>
</head>
<body>
<div id="corpo-form">
	<h1>Entrar</h1>
	<form method="POST">
		<input type="email" placeholder="Usuario" name='email'>
		<input type="password" placeholder="Senha" name='senha'>
		<input type="submit" value="ACESSAR" class="entrar">
		<a href="cadastrar.php">Ainda não é inscrito? <strong>Cadastre-se</strong></a>
	</form>
</div>
	<?php
	if(isset($_POST['email']))
	{
		$email = addslashes($_POST['email']);
		$senha = addslashes($_POST['senha']);
		//verificando se todos os campos nao estao vazios
		if(!empty($email) && !empty($senha))
		{
			$u->conectar("projeto_login","localhost","root",""); //conectando ao banco
			if($u->msgErro=="") // caso a mensagem esteja vazia, login ok
			{
				if ($u->logar($email, $senha))
				{
					header("location:areaprivada.php"); //encaminhado para proxima area apos verificar usuario e senha
				}
				else
				{
					?>
					<div class="msg_erro">
						Email e/ou senha estão incorretos!
					</div>
					<?php
				}
			}
			else
			{
				?>
				<div class="msg_erro">
					<?php echo "Erro: ".$u->msgErro; ?>
				</div>
				<?php
			}
		}
		else
		{
      ?>
			<div class="msg_erro">
				Preencha todos os campos!
			</div>
			<?php
		}
	}
	?>
</body>
</html>
