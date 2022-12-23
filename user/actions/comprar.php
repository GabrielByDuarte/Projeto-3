<?php
include_once '/home/vhosts/bar-web.orgfree.com/projeto/user/conexao.php';


if (isset($_POST['comprar'])) {

    $produtoNome = $_POST['nomeProduto'];
    $dataId = date('Y-m-d');

    $IDCookie = $_COOKIE["ID"];

    $rs = $con->query("SELECT * FROM produto");
    while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
        $produto1 = $row->produto;

        if ($produto1 == $_POST['nomeProduto']) {
            $valor1 = $row->valor;
            $quantidadeTotal = $_POST['quantidadeProduto'];
            $valorTotal = $valor1 * $quantidadeTotal;
            $idproduto = $row->idproduto;
        }
    }
    $quantidadeProduto = $_POST['quantidadeProduto'];

    //$nomeProduto = $_POST['nomeProduto'];
    $naoPago = "não pago";


    $rs = $con->query(
        "INSERT INTO pedido (data,usuario_idusuario,processo) VALUES ('" . $dataId . "'," . $IDCookie . ",'" . $naoPago  . "')"
    );

    $rs = $con->query("SELECT * FROM pedido");
    while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
        $idpedido = $row->idpedido;
    }

    echo $idpedido . "<br>" . $quantidadeProduto . "<br>" . $valorTotal . "<br>" . $idproduto;


    $rs = $con->query(
        "INSERT INTO `produto-pedido`(`pedido_idpedido`, `quantidade`, `valor`, `produto_idproduto`) VALUES (" . $idpedido  . "," . $quantidadeProduto . ",'" . $valorTotal   . "'," . $idproduto . ")"
    );
 
    $IDCookie = $_COOKIE["ID"];
  

    $rs = $con->query("SELECT * FROM usuario WHERE idusuario='".$IDCookie ."'");
    while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
        $nome = $row->nome;
        $email=$row->email;
    }

$nomeEmail=$nome;
$email= $email;
$produtoEmail=$produtoNome;
$quantidadeEmail=$quantidadeProduto ;
$valorEmail=$valorTotal;


    include_once '/home/vhosts/bar-web.orgfree.com/projeto/user/tools/notificarEmail.php';
}



header('location:http://bar-web.orgfree.com/projeto/user/usuario.php');
