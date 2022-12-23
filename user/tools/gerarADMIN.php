<?php

include_once '/home/vhosts/bar-web.orgfree.com/projeto/user/conexao.php';

if (isset($_POST['gerarADMIN'])) {
    echo $id = $_POST["novoAdmin"]; 

    $rs = $con->query(
        "UPDATE usuario SET status='admin' WHERE idusuario=".$id.""
    );
}

 if (isset($_POST['removerADMIN'])) {
    echo $id = $_POST["removerAdmin"]; 

    $rs = $con->query(
        "UPDATE usuario SET `status`='' WHERE `usuario`.`idusuario`=".$id.""
    );
}
header('location:http://bar-web.orgfree.com/projeto/user/usuario.php'); 