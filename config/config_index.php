
<?php
require_once '/home/vhosts/bar-web.orgfree.com/projeto/user/conexao.php';

class Usuario
{
    private $ID;
    private $cpf;
    private $senha;

    private $emailBD;
    private $cpfBD;
    private $senhaBD;

    public function getID()
    {
        return $this->ID;
    }
    public function setID($ID)
    {
        $this->ID = $ID;
    }
    public function getCpf()
    {
        return $this->cpf;
    }
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }

    public function getSenha()
    {
        return $this->senha;
    }
    public function setSenha($senha)
    {
        $this->senha = $senha;
    }
    public function getEmailBD()
    {
        return $this->emailBD;
    }
    public function setEmailBD($emailBD)
    {
        $this->emailBD = $emailBD;
    }

    public function getSenhaBD()
    {
        return $this->senhaBD;
    }
    public function setSenhaBD($senhaBD)
    {
        $this->senhaBD = $senhaBD;
    }
    public function getCpfBD()
    {
        return $this->cpfBD;
    }
    public function setCpfBD($cpfBD)
    {
        $this->cpfBD = $cpfBD;
    }
}

$usuario1 = new Usuario();
$usuario1->setID($_GET['ID']);
$usuario1->setSenha($_GET['senha']);


$nomeCookie = $usuario1->getID();
$md5Cookie = $md5 = md5($usuario1->getSenha());


if (isset($_GET['login'])) {
    $cont = "false";
    $rs = $con->query("SELECT * FROM usuario");
    while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
        $IDCookie = $row->idusuario;
        $usuario1->setEmailBD($row->email);
        $usuario1->setCpfBD($row->cpf);
        $usuario1->setSenhaBD($row->senha);

        $md5 = md5($usuario1->getSenha());

        if ($usuario1->getCpfBD() == $usuario1->getID()) {
            if ($md5 == $usuario1->getSenhaBD()) {
                setCookie("ID", "$IDCookie", (time() + (3 * 24 * 3600)));

                header('Location:http://bar-web.orgfree.com/projeto/user/usuario.php');
            }
        }
        if ($usuario1->getEmailBD() == $usuario1->getID()) {
            if ($md5 == $usuario1->getSenhaBD()) {
                setCookie("ID", "$IDCookie", (time() + (3 * 24 * 3600)));

                header('Location:http://bar-web.orgfree.com/projeto/user/usuario.php');
            }
        }
    }
    if ($cont == "false") {
        echo " <script>
    alert('Dados invalidos!!');
    window.history.pushState('', '', '?');
    </script>";
    }
    $cont = "true";
}




?>