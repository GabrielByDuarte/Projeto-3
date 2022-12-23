<?php

include_once '/home/vhosts/bar-web.orgfree.com/projeto/user/conexao.php';



if (isset($_POST['add'])) {
    $produtoExist=1;

    $rs = $con->query("SELECT * FROM categoria WHERE tipo='" . $_POST['categoria'] . "'");
    while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
        $caterogia = $row->idcategoria;
    }
    $rs = $con->query("SELECT * FROM produto");
    while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
        $produto=$row->produto;
        if($produto== $_POST['nomeProduto'] ){
            $produtoExist++;
        }
    }
    if($_POST['valorProduto'] =="0.00"){
        $produtoExist++;
    }
    
    if($produtoExist==1){
    
        $rs = $con->query(
            "INSERT INTO produto (produto, valor,categoria_idcategoria) VALUES('" . $_POST['nomeProduto'] . "', '" . $_POST['valorProduto'] . "'," . $caterogia . ")"
        );
        header('location:http://bar-web.orgfree.com/projeto/user/usuario.php');
    }else{
        echo "<script>
        alert('Nome já existente ou valor igual a R$0!');
    window.location.assign('http://bar-web.orgfree.com/projeto/user/usuario.php');
        </script>";
        
    }
    
} 

if (isset($_POST['excluir'])) {
    $produto = $_POST["nomeProduto"];

    $rs = $con->query(
        "DELETE FROM produto WHERE produto = '" . $produto . "'"
    );
    header('location:http://bar-web.orgfree.com/projeto/user/usuario.php');
}

if (isset($_POST['editar'])) {

    $produto = $_POST["nomeProduto"];
    $newValor = $_POST['newValor'];
    $newName =  $_POST['newName'];

    $rs = $con->query("SELECT * FROM categoria WHERE tipo='" . $_POST['newCategoria'] . "'");
    while ($row = $rs->fetch(PDO::FETCH_OBJ)) {

        $newCategoria = $row->idcategoria;
    }


    $rs = $con->query("SELECT * FROM produto WHERE produto='" . $produto . "'");
    while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
        $idProduto = $row->idproduto;
    }

    $rs = $con->query(
        "UPDATE produto SET produto='" . $newName . "',valor='" . $newValor . "',categoria_idcategoria=" . $newCategoria . "
        WHERE idproduto=" . $idProduto . ""
    );
    header('location:http://bar-web.orgfree.com/projeto/user/usuario.php');
}



