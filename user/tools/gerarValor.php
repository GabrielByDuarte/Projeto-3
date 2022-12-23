<?php

include_once '/home/vhosts/bar-web.orgfree.com/projeto/user/conexao.php';

if (isset($_POST['gerar'])) {
    $valor = 0;

    $rs = $con->query("SELECT * FROM pedido INNER JOIN `produto-pedido` ON pedido.idpedido=`produto-pedido`.`pedido_idpedido`");
    $idEscolhido = $_POST['usuarioPago'];
    $mesEscolhido = $_POST['meses'];

    require '/home/vhosts/bar-web.orgfree.com/projeto/user/tools/mes-invert.php';

       $dia = $_POST['pagamento'];
    $dia = explode("-", $dia);
    while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
        if (($row->processo == "não pago") && ($idEscolhido == $row->usuario_idusuario)) {
            $horario = $row->data;
            $horarioSplit = explode("-", $horario);

            if ($horarioSplit[1] == $mesEscolhido1) {
                $valor = $valor + $row->valor;
                $valor=round($valor);
            }
        }
    }
    if ($dia[2]  <= 10) {
        $valor = $valor - 10 * ($valor / 100);
    } else if ($dia[2]  > 10) {
        $valor = $valor + 25 * ($valor / 100);
    }

    $rs = $con->query("SELECT * FROM usuario");
    while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
        if ($idEscolhido == $row->idusuario) {
            $nomeEscolhido = $row->nome;
        }
    }

    setcookie("MesEscolhido", $mesEscolhido1);
    setcookie("IDEscolhido", $idEscolhido);
    setcookie("NomeEscolhido", $nomeEscolhido);
    setcookie("Valor", $valor);

    echo  "<script> if(confirm('O valor do mês de " . $mesEscolhido . " do/a " . $nomeEscolhido . " é de R$" . $valor . ". Deseja confirmar o pagamento?')== false) {
        window.location.href = 'http://bar-web.orgfree.com/projeto/user/usuario.php';
    }else{";



    echo ";
        window.location.href = 'http://bar-web.orgfree.com/projeto/user/tools/gerarPagamento.php';
    }
    
    </script>";
}
