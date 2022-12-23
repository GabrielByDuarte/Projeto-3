<?
include_once '/home/vhosts/bar-web.orgfree.com/projeto/user/conexao.php';

$nomeLogout = $usuario1->getNome($_GET['nome']);


$nomeValidado = 1;
$rs = $con->query("SELECT nome FROM usuario");
while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
    $nome = $row->nome;
    if ($nome == $nomeLogout) {
        $nomeValidado++;
    }
}

$cpfLogout = $usuario1->getCpf($_GET['cpf']);


$cpfValidado = 1;
$rs = $con->query("SELECT cpf FROM usuario");
while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
    $cpf = $row->cpf;
    if ($cpf == $cpfLogout) {
        $cpfValidado++;
    }
}


$return = 1;
$cpf = $usuario1->getCpf();
$cpf = preg_replace('/[^0-9]/is', "", $cpf);
$cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);

// Verifica se o numero de digitos informados é igual a 11
if (strlen($cpf) != 11) {
    $return++;
}
// Verifica se nenhuma das sequências invalidas abaixo
// foi digitada. Caso afirmativo, retorna falso
else if (
    $cpf == '00000000000' ||
    $cpf == '11111111111' ||
    $cpf == '22222222222' ||
    $cpf == '33333333333' ||
    $cpf == '44444444444' ||
    $cpf == '55555555555' ||
    $cpf == '66666666666' ||
    $cpf == '77777777777' ||
    $cpf == '88888888888' ||
    $cpf == '99999999999'
) {
    $return++;
    // Calcula os digitos verificadores para verificar se o
    // CPF é válido
} else {

    for ($t = 9; $t < 11; $t++) {
        for ($d = 0, $c = 0; $c < $t; $c++) {
            $d += $cpf[$c] * (($t + 1) - $c);
        }
        $d = ((10 * $d) % 11) % 10;
        if ($cpf[$c] != $d) {
            $return++;
        }
    }
}
