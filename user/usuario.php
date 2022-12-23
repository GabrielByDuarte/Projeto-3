<!DOCTYPE html>
<html>

<head>
	<title>Bar 800K</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body class="col-1 fundo" id="all" style="">

	<div style="font-family:cursive;">


		<div class="saida">
			<button class="button" onClick="Sair()"><i class="sair fas fa-sign-out-alt"></i>Sair</button>
			<script>
				function Sair() {
					window.history.pushState("", "", "/");
					window.location.href = "http://bar-web.orgfree.com/projeto/index.php";
				}
			</script>

			<img class="alien-img" src="http://bar-web.orgfree.com/projeto/user/images/alien.webp" alt="">

			<!--<button class="dolar button" id="icone" onClick="perfil()">
				<i class="fa-solid fa-angles-left" id="giro"></i>Perfil</button>
			-->
		</div>


		<script>
			function perfil() {
				var submenu = document.getElementById('col-3');
				var giro = document.getElementById('giro');
				if (submenu.style.display == 'block') {
					submenu.style.display = 'none'
					giro.style.transform = 'none'

				} else {
					submenu.style.display = 'block';
					giro.style.transform = 'rotate(270deg)'
				}
			}

			function consumo() {
				var submenu = document.getElementById('submenu');
				if (submenu.style.display == 'block') {
					submenu.style.display = 'none';

				} else {
					submenu.style.display = 'block';
					var submenu2 = document.getElementById('submenu2');
					var submenu3 = document.getElementById('submenu3');
					submenu3.style.display = 'none';
					submenu2.style.display = 'none';

				}
			}



			function comprar() {
				var submenu = document.getElementById('submenu2');
				if (submenu.style.display == 'block') {
					submenu.style.display = 'none';
				} else {
					submenu.style.display = 'block';
					var submenu2 = document.getElementById('submenu');
					var submenu3 = document.getElementById('submenu3');
					submenu2.style.display = 'none';
					submenu3.style.display = 'none';
				}
			}

			function opcoes() {
				var submenu3 = document.getElementById('submenu3');
				if (submenu3.style.display == 'block') {
					submenu3.style.display = 'none';
				} else {
					submenu3.style.display = 'block';
					var submenu2 = document.getElementById('submenu2');
					var submenu = document.getElementById('submenu');
					submenu2.style.display = 'none';
					submenu.style.display = 'none';
				}
			}
		</script>
		<div class="corpo">
			<div class="bloco-10">
				<div class="col-7">
					<div class="nav">
						<ul class="menu">
							<a href="#" onclick="consumo()">
								<div>
								<i class="fa-solid fa-list"></i> Consumo
								</div>
							</a>

							<a href="#" onclick="comprar()">
								<div><i class="fa-solid fa-bag-shopping"></i>
									Produtos</div>
							</a>

							<a href="#" id="admin" style="display:none" onclick="opcoes()">
								<div>
								<i class="fa-solid fa-screwdriver-wrench"></i> ADMIN</div>
							</a>

							<?php


							require_once '/home/vhosts/bar-web.orgfree.com/projeto/user/conexao.php';

							$IDCookie = $_COOKIE["ID"];

							$rs = $con->query("SELECT * FROM usuario WHERE idusuario='" . $IDCookie . "'");
							while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
								$estados = $row->status;
							}

							echo "<script>
			var admin = document.getElementById('admin');
			if ('".$estados."'=='admin+') {
				admin.style.display = 'block';
			}
			
			</script>";
			echo "<script>
			var admin = document.getElementById('admin');
			if ('".$estados."'=='admin') {
				admin.style.display = 'block';
			}
			
			</script>";
			echo "<script>
			var admin+ = document.getElementById('admin+'); 
			if ('".$estados."'=='admin+') {
				admin+.style.display = 'block'; 
			}
			
			</script>";

		 
							?>
						</ul>
					</div>
					<div class="add-excluir" id="add-excluir" style="display:none;" onmouseover="aparecerTexto();" onmouseout="reset();">
						<a class="submenu-add" href="#" onclick="add(),reset();">
							<div id="submenu-add">Adicionar produto</div>
						</a>
						<br>
						<a class="submenu-excluir" href="#" onclick="excluir(),reset();">
							<div id="submenu-excluir">Excluir produto</div>
						</a>
					</div>



					<div class="conteudo" id="submenu" style="display:none;">
						<div class="consumo">
						<table border="1"     width="100%">
						<tr><td><strong>Produto</strong></td><td><strong>Quantidade</strong></td><td><strong>Valor</strong></td><td><strong>Data</strong></td></tr>
							<?php require_once 'conexao.php';

								$IDCookie = $_COOKIE["ID"];

							$rs1 = $con->query("SELECT * FROM pedido INNER JOIN `produto-pedido` ON pedido.idpedido=`produto-pedido`.`pedido_idpedido` WHERE `usuario_idusuario`=".$IDCookie ." AND processo='não pago'");

							while ($row = $rs1->fetch(PDO::FETCH_OBJ)) {

							$idproduto=$row->produto_idproduto;
									
									$quantidade = $row->quantidade;
									$valor = $row->valor;
									$data = $row->data;

									$valorMax = $valorMax + $valor;
									$valorMax=round($valorMax);
									$itensComprados = $itensComprados + $quantidade;

									$rs2 = $con->query("SELECT * FROM produto WHERE idproduto=".$idproduto."");

							while ($row = $rs2->fetch(PDO::FETCH_OBJ)) {
								$produto = $row->produto;
								
									echo "<div class='col-01'>";

									echo "<tr><td><b>";
									echo $produto;
									echo "</b></td>";
									
								}
								echo "<td><b>";
								echo $quantidade;
								echo " unidades</b></td>";
								echo "<td><b>R$";
								echo $valor;
								echo "</b></td>";
								echo "<td><b>";
								echo $data;
								echo "</b></td></tr>";
								echo "</div>";
							
							}
							



							?>

						</table>
						</div>
					</div>

					<div class="conteudo" id="submenu1" style="display:none;">
						<div class="bar">
							<b class='categoria'>DOCES</b><br>

							<?php require_once 'conexao.php';
							$rs = $con->query("SELECT * FROM produto ORDER BY produto.valor ASC");
							while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
								$valor = $row->valor;
								$produto = $row->produto;
								$descricao = $row->descrição;
								$categoria = $row->categoria;

								if ($categoria == "doce") {
									echo "<div class='col-11'>";
									echo "<b>";
									echo $row->produto;
									echo "</b>";
									echo "<b>R$";
									echo $row->valor;
									echo "</b>";
									echo "<b>";
									echo $row->descricao;
									echo "</b>";
									echo "</div>";
								}
							}

							echo "<b class='categoria'>SALGADOS</b><br>";
							$rs = $con->query("SELECT * FROM produto ORDER BY produto.valor ASC");
							while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
								$valor = $row->valor;
								$produto = $row->produto;
								$descricao = $row->descrição;
								$categoria = $row->categoria;

								if ($categoria == "salgado") {

									echo "<div class='col-11'>";
									echo "<b>";
									echo $row->produto;
									echo "</b>";
									echo "<b>R$";
									echo $row->valor;
									echo "</b>";
									echo "<b>";
									echo $row->descricao;
									echo "</b>";
									echo "</div>";
								}
							}

							echo "<b class='categoria'>BEBIDAS</b><br>";

							$rs = $con->query("SELECT * FROM produto ORDER BY produto.valor ASC");
							while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
								$valor = $row->valor;
								$produto = $row->produto;
								$descricao = $row->descrição;
								$categoria = $row->categoria;

								if ($categoria == "bebida") {

									echo "<div class='col-11'>";
									echo "<b>";
									echo $row->produto;
									echo "</b>";
									echo "<b>R$";
									echo $row->valor;
									echo "</b>";
									echo "<b>";
									echo $row->descricao;
									echo "</b>";
									echo "</div>";
								}
							}


							?>
						</div>
					</div>

					<div class="conteudo" id="submenu2" style="display:none;">
						<form action="http://bar-web.orgfree.com/projeto/user/actions/comprar.php" class="comprar" method="post">

							<label for="number">Escolha...</label>
							<br>
							<select class="input" type="text" name="nomeProduto" id="nomeProduto">
								<option value="">Produto</option>
								<optgroup label="Doces">
									<?php
									require_once 'conexao.php';

									$rs = $con->query("SELECT *, tipo AS categoria FROM produto INNER JOIN categoria ON produto.categoria_idcategoria=idcategoria ORDER BY produto.valor ASC");
									while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
										$categoria = $row->tipo;
										if ($categoria == "doce") {
											$produto = $row->produto;
											$valor = $row->valor;
											echo "<option value='";
											echo $produto;
											echo "'>";
											echo $produto;
											echo " R$";
											echo $valor;
											echo "</option>";
										}
									}
									?>
								</optgroup>

								<optgroup label="Salgados">
									<?php
									require_once 'conexao.php';
									$rs = $con->query("SELECT *, tipo AS categoria FROM produto INNER JOIN categoria ON produto.categoria_idcategoria=idcategoria ORDER BY produto.valor ASC");
									while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
										$categoria = $row->tipo;
										if ($categoria == "salgado") {
											$produto = $row->produto;
											$valor = $row->valor;
											echo "<option value='";
											echo $produto;
											echo "'>";
											echo $produto;
											echo " R$";
											echo $valor;
											echo "</option>";
										}
									}
									?>
								</optgroup>

								<optgroup label="Bebidas">
									<?php
									require_once 'conexao.php';
									$rs = $con->query("SELECT *, tipo AS categoria FROM produto INNER JOIN categoria ON produto.categoria_idcategoria=idcategoria ORDER BY produto.valor ASC");
									while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
										$categoria = $row->tipo;
										if ($categoria == "bebida") {
											$produto = $row->produto;
											$valor = $row->valor;
											echo "<option value='";
											echo $produto;
											echo "'>";
											echo $produto;
											echo " R$";
											echo $valor;
											echo "</option>";
										}
									}
									?>
								</optgroup>
							</select><br><br>
							<label for="number">Quantidade:</label>
							<input class="quantidade" type="number" name="quantidadeProduto" id="quantidadeProduto" value="1" placeholder="" required />

							<br />

							<input class="button2" type="submit" value="comprar" name="comprar" />
						</form>
					</div>
					<?php require_once "./tools/visible.html"; ?>
					<div class="conteudo" id="submenu3" style="display:none;">

						<form action="http://bar-web.orgfree.com/projeto/user/actions/config.php" class="add" method="post">
							<div class="title-admin">

								<span onClick="visible1()">ADICIONAR PRODUTO</span>
							</div>

							<div id="visible1" style="display:none">
								<label for="text">Nome produto:</label>
								<br />
								<input class="input" type="text" name="nomeProduto" id="nomeProduto" placeholder="" required />
								<br />

								<fieldset>
									<legend style="    font-size: 17px;"> Categoria </legend>
									<div>
										<input type="radio" id="categoria" name="categoria" value="doce" checked>
										<label for="categoria"> Doce </label>
									</div>
									<div>
										<input type="radio" id="categoria" name="categoria" value="salgado">
										<label for="categoria"> Salgado </label>
									</div>
									<div>
										<input type="radio" id="categoria" name="categoria" value="bebida">
										<label for="categoria"> Bebida </label>
									</div>
								</fieldset>
								<br />

								<!--<label for="text">Descrição do produto:</label>
								<br />
								<input class="input" type="text" name="descricao" id="descricao" placeholder="" />
								<br />
								<br>-->
								<label for="number">Valor</label>
								R$ <input class="quantidade1" text="number" type="ranger"  min="0.50"  name="valorProduto" id="valorProduto" value="0.50" placeholder="" required />

								<br />

								<input class="button2" type="submit" value="Adicionar" name="add" />
							</div>
						</form>

						<form action="http://bar-web.orgfree.com/projeto/user/actions/config.php" class="excluir" method="post">
							<div class="title-admin"><span onClick="visible2()">EXCLUIR PRODUTO</span></div>
							<div id="visible2" style="display:none"><label for="number">Nome produto:</label>
								<br />

								<select class="input" name="nomeProduto" id="nomeProduto">
									<option value="">-- Produto --</option>
									<optgroup label="Doces">
										<?php
										require_once 'conexao.php';
										$rs = $con->query("SELECT *, tipo AS categoria FROM produto INNER JOIN categoria ON produto.categoria_idcategoria=idcategoria ORDER BY produto.produto ASC");
										while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
											$categoria = $row->tipo;
											if ($categoria == "doce") {
												$produto = $row->produto;

												echo "<option value='";
												echo $produto;
												echo "'>";
												echo $produto;
												echo "</option>";
											}
										}
										?>
									</optgroup>

									<optgroup label="Salgados">
										<?php
										require_once 'conexao.php';
										$rs = $con->query("SELECT *, tipo AS categoria FROM produto INNER JOIN categoria ON produto.categoria_idcategoria=idcategoria  ORDER BY produto.produto ASC");
										while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
											$categoria = $row->tipo;
											if ($categoria == "salgado") {
												$produto = $row->produto;

												echo "<option value='";
												echo $produto;
												echo "'>";
												echo $produto;
												echo "</option>";
											}
										}
										?>
									</optgroup>

									<optgroup label="Bebidas">
										<?php
										require_once 'conexao.php';
										$rs = $con->query("SELECT * , tipo AS categoria FROM produto INNER JOIN categoria ON produto.categoria_idcategoria=idcategoria ORDER BY produto.produto ASC");
										while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
											$categoria = $row->tipo;
											if ($categoria == "bebida") {
												$produto = $row->produto;
												echo "<option value='";
												echo $produto;
												echo "'>";
												echo $produto;
												echo "</option>";
											}
										}
										?>
									</optgroup>
								</select>

								<input class="button2" type="submit" value="Excluir" name="excluir" />
							</div>
						</form>

						<form action="http://bar-web.orgfree.com/projeto/user/actions/config.php" class="editar" method="post">
							<div class="title-admin"><span onClick="visible3()">EDITAR PRODUTO</span></div>
							<div id="visible3" style="display:none"><label for="bumber">Nome produto:</label>
								<br>
								<select class="input" name="nomeProduto">
									<option value="">-- Produto --</option>
									<optgroup label="Doces">
										<?php
										require_once 'conexao.php';
										$rs = $con->query("SELECT * , tipo AS categoria FROM produto INNER JOIN categoria ON produto.categoria_idcategoria=idcategoria ORDER BY produto.produto ASC ");
										while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
											$categoria = $row->tipo;
											if ($categoria == "doce") {
												$produto = $row->produto;

												echo "<option value='";
												echo $produto;
												echo "'>";
												echo $produto;
												echo "</option>";
											}
										}
										?>
									</optgroup>

									<optgroup label="Salgado">
										<?php
										require_once 'conexao.php';
										$rs = $con->query("SELECT * , tipo AS categoria FROM produto INNER JOIN categoria ON produto.categoria_idcategoria=idcategoria ORDER BY produto.produto ASC ");
										while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
											$categoria = $row->tipo;
											if ($categoria == "salgado") {
												$produto = $row->produto;

												echo "<option value='";
												echo $produto;
												echo "'>";
												echo $produto;
												echo "</option>";
											}
										}
										?>
									</optgroup>

									<optgroup label="Bebidas">
										<?php
										require_once 'conexao.php';
										$rs = $con->query("SELECT * , tipo AS categoria FROM produto INNER JOIN categoria ON produto.categoria_idcategoria=idcategoria ORDER BY produto.produto ASC");
										while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
											$categoria = $row->tipo;
											if ($categoria == "bebida") {
												$produto = $row->produto;
												echo "<option value='";
												echo $produto;
												echo "'>";
												echo $produto;
												echo "</option>";
											}
										}
										?>
									</optgroup>
								</select>
								<br>
								<br><label for="text">Novo nome do produto:</label>

								<input class="input" type="text" name="newName" id="newName" placeholder="" required />
								<br><br>
								<select class="input" name="newCategoria">
									<option value="">-- Categoria --</option>
									<option value=salgado>SALGADO</option>
									<option value=doce>DOCE</option>
									<option value=bebida>BEBIDA</option>
								</select>
								<br><br>
								<!--<label for="text">Nova descrição:</label>

								<input class="input" type="text" name="newDescricao" id="newDescricao" placeholder="" required />
								<br><br>-->
								<label for="number">Novo valor</label>
								R$ <input class="input" text="text" name="newValor" id="newValor" value="0.50" placeholder="" required />

								<br>
								<input class="button2" type="submit" value="Editar" name="editar" />
							</div>

						</form>

						<form action="http://bar-web.orgfree.com/projeto/user/tools/gerarValor.php" class="pago" method="post">
							<div class="title-admin "><span onClick="visible4()">MÊS PAGO</span></div>
							<div id="visible4" style="display:none"><label for="number">Nome do usuario:</label>
								<br />

								<select class="input" name="usuarioPago" id="usuarioPago">
									<option value="">-- Usuario --</option>
									<optgroup label="usuario">
										<?php
										require_once 'conexao.php';



										$rs = $con->query("SELECT * FROM usuario ORDER BY usuario.nome ASC");
										while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
											$nome = $row->nome;
											$idPago = $row->idusuario;
											echo "<option ";
											echo "value='";
											echo $idPago;
											echo "' required>";
											echo $nome;
											echo "</option>";
										}
										?>
									</optgroup>

								</select><br><br>
								<label for="number">Mês do Pagamento:</label>
								<select class="input" name="meses" id="meses">
									<option value="">-- meses --</option>
									<optgroup label="mes">
										<?php

										for ($i = 1; $i <= 12; $i++) {
											$data = $i;
											require "./tools/mes.php";
											echo "<option ";
											echo " value='";
											echo $data1;
											echo "' required>";
											echo $data1;

											require "./tools/mes-invert.php";
											echo "</option>";
										}


										?>
									</optgroup>

								</select>
								<br><br>
								<label for="pagamento">Data de pagamento:</label>

								<input type="date" id="pagamento" name="pagamento" value="" required>
								<br />
								<br />


								<input class="button2" type="submit" value="Gerar valor" name="gerar" />
							</div>
						</form>


						<form action="http://bar-web.orgfree.com/projeto/user/tools/gerarLista.php" class="gerarLista" method="post">
							<div class="title-admin "><span onClick="visible5()">GERAR LISTA DE PAGAMENTO</span></div>
							<div id="visible5" style="display:none">
							<label for="number">Mês do Pagamento:</label>
								<select class="input" name="meses" id="meses">
									<option value="">-- meses --</option>
									<optgroup label="mes">
										<?php

										for ($i = 1; $i <= 12; $i++) {
											$data = $i;
											require "./tools/mes.php";
											echo "<option ";
											echo " value='";
											echo $data1;
											echo "' required>";
											echo $data1;

											require "./tools/mes-invert.php";
											echo "</option>";
										}


										?>
									</optgroup>

								</select>
								<input class="button2" type="submit" value="Gerar Lista" name="gerarLista" />
							</div>
						</form>

						<form action="http://bar-web.orgfree.com/projeto/user/tools/gerarADMIN.php" class="gerarADMIN" method="post">
							<div class="title-admin "><span onClick="visible6()">CONTROLE DE ADMIN</span></div>
							<div id="visible6" style="display:none">
							<label for="number">Novo ADMIN:</label>
								<select class="input" name="novoAdmin" id="novoAdmin">
									<option value="">-- usuario --</option>
									<optgroup label="novoAdmin">
										<?php

require_once 'conexao.php';



$rs = $con->query("SELECT * FROM usuario  ORDER BY usuario.nome ASC ");
while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
	if($row->status==null){
	$nome = $row->nome;
	$idRemover = $row->idusuario;
	echo "<option ";
	echo "value='";
	echo $idRemover;
	echo "' required>";
	echo $nome;
	echo "</option>";
}
}

										?>
									</optgroup>

								</select>
								<input class="button2" type="submit" value="Gerar ADMIN" name="gerarADMIN" />
								<?php
									require_once 'conexao.php';
									$IDCookie = $_COOKIE["ID"];
									$rs = $con->query("SELECT * FROM usuario WHERE idusuario=".$IDCookie." ");
									while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
										if($row->status=="admin+"){
									echo "<script> 
									var removerADMINs = document.getElementById('removerADMINs');
									removerADMINs.style.display = 'block';
								
								</script>";}
							}

								?>
<div id="removerADMINs" style="display:none;"><br><br>
								<label for="number">Remover ADMIN:</label>
								<select class="input" name="removerAdmin" id="removerAdmin">
									<option value="">-- usuario --</option>
									<optgroup label="removerAdmin">
										<?php
	require_once 'conexao.php';



	$rs = $con->query("SELECT * FROM usuario ORDER BY usuario.nome ASC ");
	while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
		if($row->status=="admin"){
		$nome = $row->nome;
		$idDelete = $row->idusuario;
		echo "<option ";
		echo "value='";
		echo $idDelete;
		echo "' required>";
		echo $nome;
		echo "</option>";}
	}
										 

										?>
									</optgroup>

								</select>
								<input class="button2" type="submit" value="Remover ADMIN" name="removerADMIN" /></div>
							</div>
						</form>


					</div>


				</div>
				<div class="col-3" id="col-3"  >
					<span class="bold">
						<p>
							<?php require_once 'conexao.php';

							$rs = $con->query("SELECT * FROM usuario WHERE idusuario='" . $IDCookie . "'");
							while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
								$nome = $row->nome;

								echo $nome;
							}




							?>


						</p>
					</span>
					<p>Quantidade de itens - <span class="bold"><?= $itensComprados; ?> unidades</span></p>
					<p>Valor do mês - <span class="bold">R$<?= $valorMax; ?></span></p>
					<p>Valor com desconto de 10% - <span class="bold-green">R$<?= $valorMaxDesco = $valorMax - (($valorMax / 100) * 10); ?></span></p>
					<p>Valor com juros de 25% - <span class="bold-red">R$<?= $valorMaxJuros = $valorMax + (($valorMax / 100) * 25); ?></span></p>
				</div>
			</div>
		</div>

		<script src="https://kit.fontawesome.com/7ffcae3699.js" crossorigin="anonymous"></script>

		<style>
			table, th, td {
  border: 1px solid;
}
			.consumo b{
				font-weight:400;
			}
			.alien-img {
				width: 70px;
			}

			@media (min-width:767px) {
				.alien-img {
					display: none;
				}
			}

			.button-p {
				cursor: pointer;
			}

			.add {
				margin: 2px 2px 10px 2px;
				padding: 7px;
				border: solid 1px silver;
				box-shadow: 0px 1px 5px 1px #00000066;
			}

			.excluir {
				margin: 2px 2px 10px 2px;
				padding: 7px;
				border: solid 1px silver;
				box-shadow: 0px 1px 5px 1px #00000066;
			}

			.editar {
				margin: 2px 2px 10px 2px;
				padding: 7px;
				border: solid 1px silver;
				box-shadow: 0px 1px 5px 1px #00000066;
			}

			#add-excluir {
				font-weight: bold;
				padding: 10px;
				text-align: center;
				width: 100%;
				position: fixed;
			}

			#add-excluir a {
				cursor: pointer;

				text-decoration: none;
			}

			#add-excluir div {
				color: #4cb050;
			}

			#add-excluir div:hover {
				color: silver;
			}

			.pago,.gerarLista,.gerarADMIN {
				margin: 2px 2px 10px 2px;
				padding: 7px;
				border: solid 1px silver;
				box-shadow: 0px 1px 5px 1px #00000066;
			}

			.col-01 b {
				font-weight: 400;
				color: black;

				text-align: center;
				width: 25%;
			}

			.title-admin {
				cursor: pointer;
				text-align: center;
				font-weight: bold;
				padding: 5px;
			}

			.perfil {
				margin-right: 15px;
				width: 40px;
			}

			.col-01 {
				display: flex;
				justify-content: space-around;
			}

			.bar .col-03 h2 {
				font-size: 20px;
			}

			.bar .col-03 {

				display: flex;
				justify-content: space-around;
			}

			.bar .col-1 b {
				text-align: center;
				width: 50%;
				font-weight: 400;
			}

			.bar .col-2 {
				width: 100%
			}

			.bar .col-1 {

				display: flex;
				justify-content: space-around;
			}

			.bar h1 {
				display: none;
				font-size: 20px;
			}

			.bar {
				padding-left: 18px;
			}

			.comprar {
				padding-left: 18px;
			}

			.giro {
				margin-right: 5px;
			}

			.button:hover {
				background-color: #4cb050;
				color: black;

			}

			.button2 {
				cursor: pointer;
				width: 169px;
				border: solid black 1.5px;
				font-weight: bold;
				font-family: Arial;
				color: black;

				padding: 8px;
				margin: 10px auto;
				display: flex;
				font-size: smaller;
				text-decoration: none;
				border-radius: 3px;
				background-color: #4cb050;
				justify-content: center;
			}

			.button2:hover {
				background-color: black;
				color: #4cb050;
			}

			.input {
				font-size: 17px;
				padding: 0;
				height: 40px;
				padding-left: 6px;
				background-color: #efecec;
				border: solid 1px #152740;
				border-radius: 4px;
				width: 90%;
			}

			.quantidade {
				text-align: center;
				font-size: 17px;
				padding: 0;
				height: 40px;
				padding-left: 6px;
				background-color: #efecec;
				border: solid 1px #152740;
				border-radius: 4px;
				width: 50px;

			}

			.quantidade1 {
				text-align: center;
				font-size: 17px;
				padding: 0;
				height: 40px;
				padding-left: 6px;
				background-color: #efecec;
				border: solid 1px #152740;
				border-radius: 4px;
				width: 60px;
			}

			label {
				font-size: 17px;
			}

			.numero {
				text-align: center;

				width: 33px;
				background-color: silver;
				border-radius: 100%;
				padding: 5px;
				font-weight: bold;
			}

			.bloco-10 {
				align-items: flex-start;
				display: flex;
				width: 100%;
				flex-direction: row-reverse;
				justify-content: space-evenly;
			}

			.box-consumo {
				justify-content: space-between;
				margin: 2px 0;
				border: 1px solid silver;
				border-radius: 6px;
				display: flex;
				align-items: center;
				padding: 8px;
			}

			.sim-nao {
				width: 23px;
			}

			.conteudo {
				background-color: white;
			}

			.col-3 {
				background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(https://www.estudokids.com.br/wp-content/uploads/2018/11/galaxia-1200x675.jpg);
				padding-top: 11px;
				background-size: cover;
				border: 1px solid #4cb050;
				margin: 10px auto 0;
				max-width: 32%;
				width: 98%;
			}

			.corpo {
				margin: 0 1%;
			}

			.col-7 {
				margin: 0px auto 0;
				border: 1px solid #4cb050;
				width: 100%;
				max-width: 67%;
				background-color: white;
				margin-top: 10px;
			}

			.col-3 p {
				padding-left: 12px;
				color: white;
			}

			.bold {
				font-weight: bold;
			}

			.bold-green {
				color: #06e406;
				font-weight: bold;
			}

			.bold-red {
				color: red;
				font-weight: bold;
			}

			.menu a {
				width: 33%;
				color: black;
				text-decoration: none;
			}

			.menu div {
				font-weight: bold;
				padding: 10px;
				text-align: center;
				width: 100%;
				color: #4cb050;
			}

			.menu div:hover {
				background-color: #4cb050;
				color: black;
			}

			.nav {
				display: contents;
				width: 100%;
			}

			.menu {
				background-color: #131313;
				display: flex;
				flex-wrap: nowrap;
				justify-content: space-around;
			}

			ul {
				padding: 0;
				margin: 0;
			}


			.sair {
				padding-left: 6px;
				display: inline-block;
				transform: scale(-1, 1);
			}

			.h3 {
				margin: 0;
				padding: 20px;
				background-color: white;
			}

			* {
				font-family: -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Noto Sans, Ubuntu, Droid Sans, Helvetica Neue, sans-serif;
				/* font-family: Verdana, sans-serif; */
			}

			.col-1 {
				filter: drop-shadow(2px 4px 6px black);
				height: 1000px;
				background-color: #323232;
				width: 100%;
			}

			@media only screen and (max-width: 700px) {


				#add-excluir {
					padding: 10px 17px 0px 0;
					text-align: right;
				}

				#icone {
					display: block !important;
				}

				.saida {
					justify-content: space-between;
					align-items: center;
				}

				.bloco-10 {
					flex-direction: column-reverse !important;
				}

				.col-7 {
					max-width: 100%;
				}

				.col-3 {
					max-width: 100%;
				}
			}

			@media only screen and (min-width: 700px) {
				.col-1 {
					background-position: center;
					background-repeat: no-repeat;
					background-image: url(http://bar-web.orgfree.com/projeto/user/images/alien.webp);
				}

				#col-3 {
					display: block !important;
				}

			}

			.button {
				margin: 10px;
				cursor: pointer;
				border: none;
				font-weight: bold;
				color: #4cb050;
				padding: 9px;
				font-size: medium;
				text-decoration: none;
				border-radius: 3px;
				background-color: white;
				display: flex;
				padding-left: 15px;
				align-items: center;
				background-color: #131313;
				border: #4cb050 1px solid;
			}

			#icone:hover {
				background-color: #4cb050;
				color: black;
			}

			#icone {
				margin: 10px;
				cursor: pointer;
				font-weight: bold;
				color: #4cb050;
				padding: 9px;
				font-size: medium;
				text-decoration: none;
				border-radius: 3px;
				display: none;
			}



			.saida {
				display: flex;
			}
		</style>
		<?php



		?>

		<?php echo "<script>";include_once "/home/vhosts/bar-web.orgfree.com/projeto/user/tools/no-ads.js";
		echo "</script>";?>
</body>

</html>