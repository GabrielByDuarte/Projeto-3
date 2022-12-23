<?php
include_once '/home/vhosts/bar-web.orgfree.com/projeto/user/conexao.php';

echo $IDPago = $_COOKIE["IDEscolhido"];
echo $mesEscolhido = $_COOKIE["MesEscolhido"];

$rs = $con->query("SELECT * FROM pedido WHERE `usuario_idusuario`='" . $IDPago . "'");
while ($row = $rs->fetch(PDO::FETCH_OBJ)) {

    $dataDB = $row->data;
    $mes = explode("-", $dataDB);
    echo $dataDB = $mes[1];


    if ($mesEscolhido == $dataDB) {
        $rs = $con->query(
            "UPDATE pedido SET processo='pago' WHERE `usuario_idusuario`=" . $IDPago . ""
        );
        echo "<script>
    alert('Mês pago!!!');
    window.location.href='http://bar-web.orgfree.com/projeto/user/usuario.php';
    
</script>";
    } else {
        echo "<script>
        window.location.href='http://bar-web.orgfree.com/projeto/user/usuario.php';
        </script>";
    }
}
setcookie("NomeEscolhido", "", time() - 3600);
setcookie("MesEscolhido", "", time() - 3600);
setcookie("IDEscolhido", "", time() - 3600);
setcookie("Valor", "", time() - 3600);
