

<div id="divLista">
<table  border="1">

<tr>
    <td>Nome Usuário</td>
    <td>Valor do Mês</td> 
</tr> 

<?php
 
require_once '/home/vhosts/bar-web.orgfree.com/projeto/user/conexao.php'; 

 $mesEscolhido=$_POST['meses'];
 

require_once '/home/vhosts/bar-web.orgfree.com/projeto/user/tools/mes-invert.php';
 
 $mesEscolhido1;

$rs2 = $con->query("SELECT * FROM usuario ORDER BY usuario.nome ASC ");
while ($row = $rs2->fetch(PDO::FETCH_OBJ)) {

    echo  "<tr><td>".$row->nome."</td>";
    $idusuario=$row->idusuario;
    $valorMax="0";
$rs1 = $con->query("SELECT * FROM pedido INNER JOIN `produto-pedido` ON pedido.idpedido=`produto-pedido`.`pedido_idpedido`  WHERE `usuario_idusuario`=". $idusuario." AND processo='não pago'");

                        while ($row = $rs1->fetch(PDO::FETCH_OBJ)) {
                            $dataBD=$row->data;
                             $quantidade = $row->quantidade;
                            $valor = $row->valor; 
                            $mes = explode("-", $dataBD);
                             $dataDB = $mes[1];
                          

                            if($mesEscolhido1==$dataDB){
                                $valorMax = $valorMax + $valor;
                                $valorMax=round($valorMax);
                                $itensComprados = $itensComprados + $quantidade;
                            }
                            } 
                             echo "<td>R$ ".$valorMax."</td></tr> ";
                            }
?>

</table>
</div>
 

<?php
if($_POST['meses']!=null){
    $file = "Bar - Lista do ".$_POST['meses'].".xls";
header ("Content-type: application/x-msexcel");
header ("Content-Disposition: attachment; filename=\"{$file}\"" );
header ("Content-Description: PHP Generated Data" );
    
}
else {
    header('location:http://bar-web.orgfree.com/projeto/user/usuario.php');
}

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js "></script>
