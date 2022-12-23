<?php

include_once '/home/vhosts/bar-web.orgfree.com/projeto/user/conexao.php';

class Usuario
{
	private $email;
	private $senha;
	private $nome;
	private $cpf;

	public function getEmail()
	{
		return $this->email;
	}
	public function setEmail($email)
	{
		$this->email = $email;
	}
	public function getSenha()
	{
		return $this->senha;
	}
	public function setSenha($senha)
	{
		$this->senha = $senha;
	}

	public function getNome()
	{
		return $this->nome;
	}
	public function setNome($nome)
	{
		$this->nome = $nome;
	}
	public function getCpf()
	{
		return $this->cpf;
	}
	public function setCpf($cpf)
	{
		$this->cpf = $cpf;
	}
}
$usuario1 = new Usuario();
$usuario1->setNome($_GET['nome']);
$usuario1->setSenha($_GET['senha1']);
$usuario1->setEmail($_GET['email']);
$usuario1->setCpf($_GET['cpf']);

if (isset($_GET['logout'])) {
	$cont = "false";

	include_once '/home/vhosts/bar-web.orgfree.com/projeto/config/validar_logout.php';

	if ($nomeValidado == 1) {
		if ($return == 1) {
			if($cpfValidado==1){
			if ($_GET['senha1'] == $_GET['senha2']) {
				$md5 = md5($usuario1->getSenha());
				$rs = $con->query(
					"INSERT INTO usuario (nome, senha, email, cpf) VALUES ('" . $usuario1->getNome() . "', '" . $md5 . "','" . $usuario1->getEmail() . "','" . $usuario1->getCpf() . "')"
				);
				header('Location: http://bar-web.orgfree.com/projeto/index.php');
			} else {
				echo " <script>
				alert('Senha invalida!');
				window.history.pushState('', '', '?');
				</script>";
			}

		}else if($cpfValidado != 1){
			echo " <script>
			alert('CPF existente!');
			window.history.pushState('', '', '?');
			</script>";
		}
		} else
		if ($return != 1) {
			echo " <script>
				alert('CPF invalido!');
				window.history.pushState('', '', '?');
				</script>";
		}
	} else if ($nomeValidado != 1) {
		echo " <script>
			alert('Nome de usuario já existe!');
			window.history.pushState('', '', '?');
			</script>";
	}
}
