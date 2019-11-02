<h1>bem vindo</h1>
<?php  
require_once 'classes/usuarios.php';
$u = new Usuario;
//verificar se clicou no botao
if(isset($_POST['nome']))
{
	$nome = addslashes($_POST['nome']); //addslashes evita codigos maliciosos.
	$telefone = addslashes($_POST['telefone']);
	$email = addslashes($_POST['email']);
	$senha = addslashes($_POST['senha']);
	$confirmarSenha = addslashes( $_POST['confSenha']);
	//verificando se todos os campos nao estao vazios
	if(!empty($nome) && !empty($telefone) && !empty($email) && !empty($senha) && !empty($confirmarSenha)) 
	{
		$u->conectar("projeto_login","localhost","root",""); //seta as configs do db//set db config
		if ($u->msgErro == "") //conectado normalmente;
		{
			if ($senha == $confirmarSenha) 
			{
				if ($u->cadastrar($nome, $telefone, $email, $senha))  //Enviando variaveis para o banco
				{
					echo "Cadastro realizado com sucesso!";
				}
				else
			 	{
			 		echo "Email já cadastrado, retorne e faça login.";
			 	}
			}
			else
			{
				echo "Senhas não conferem!";
			}
		}
		else 
		{
		echo "Erro: ".$u->msgErro;
		}
	}
	else
		{
			echo "Preencha todos os campos!";
		}
}
?>