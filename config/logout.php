<!DOCTYPE html>
<html>

<head>
	<title>Bar 800K</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">


	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
</head>

<body class="fundo">
	<?php
	include_once '/home/vhosts/bar-web.orgfree.com/projeto/config/config_logout.php';
	?>
	<div class="box-formulario">
		<div class="formulario">

			<br />
			<form action="" method="get" class="logout">
				<img class="ufo" src="http://bar-web.orgfree.com/projeto/user/images/animation-ufo.webp" alt="">


				<img class="alien-img" src="http://bar-web.orgfree.com/projeto/user/images/alien.webp" alt="">
				<h3 class="login">CRIAR CONTA</h3>
				<hr class="hr"><br />
				<label for="text">Seu nome completo:</label>

				<div class="box-input"><i class="fa-solid fa-user"></i><input class="input" type="text" name="nome" id="nome" placeholder="Digite seu nome completo..." required /></div>
				<br />

				<label for="text">Seu e-mail:</label>

				<div class="box-input"><i class="fa-solid fa-envelope"></i><input class="input" type="email" name="email" id="email" placeholder="Digite seu E-mail..." value="@gmail.com" required /></div>
				<label for="text" style="font-size: 13px;">Obs: digite e-mail valido para receber notificações.</label>
				<br />

				<label for="text">Seu CPF:</label>

				<div class="box-input"><i class="fa-solid fa-id-card"></i><input oninput="mascara(this)" class="input" type="text" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" name="cpf" id="cpf" placeholder="Digite seu CPF..." required /></div>

				<br />
				<label for="senha">Sua senha:</label>

				<div class="box-input"><i class="fa-solid fa-lock"></i><input class="input" type="password" name="senha1" id="senha1" placeholder="Digite sua senha..." minlength="8" required /></div>


				<br />
				<label for="senha">Repita sua senha:</label>

				<div class="box-input"><i class="fa-solid fa-lock"></i><input class="input" type="password" name="senha2" id="senha2" placeholder="DIgite sua senha..." required /></div>


				<br />
				<br />
				<br />
				<input class="button2" type="submit" value="Criar" name="logout" />

			</form>
			<br>
			<button style="margin-left: 0px;" class="button" onClick="Sair()"><i style="transform: rotate(180deg);margin-right: 10px;" class="sair fas fa-sign-out-alt"></i>Sair</button>
			<script>
				function Sair() {
					window.history.pushState("", "", "/");
					window.location.href = "http://bar-web.orgfree.com/projeto/index.php";
				}

				function mascara(i) {

					var v = i.value;

					if (isNaN(v[v.length - 1])) { // impede entrar outro caractere que não seja número
						i.value = v.substring(0, v.length - 1);
						return;
					}

					i.setAttribute("maxlength", "14");
					if (v.length == 3 || v.length == 7) i.value += ".";
					if (v.length == 11) i.value += "-";

				}
			</script>


			<br />
			<br />
		</div>
	</div>


	<style>
		.alien-img {
			width: 70px;
		}

		.box-input i {
			margin-right: 10px;
		}

		html,
		body {
			color: black;
			background: linear-gradient(270deg, rgba(118,185,82,1) 56%, rgba(178,221,154,1) 100%);;
		}

		.ufo {

			position: fixed;

			left: 0;
		}

		@media only screen and (min-width: 700px) {
			.ufo {
				width: 180px;
				position: fixed;
				top: -10%;
				left: -10%;
			}
		}

		@media only screen and (max-width: 700px) {
			.box-input {
				display: flex;
				margin: 0 15px;
			}

			.ufo {
				display: none;

			}
		}

		#olho1 {
			cursor: pointer;

		}

		#olho2 {
			cursor: pointer;
		}

		.hr {
			margin: 0 auto;
			width: 80% !important;
		}

		.hr2 {
			margin: 0;
		}

		.cadastrese {
			padding: 20px 0;
			background-color: #cfe2ff;
			display: flex;
			justify-content: center;
		}


		.formulario {
			filter: drop-shadow(2px 4px 6px black);
			background-color: white;
			align-items: center;
			text-align: center;
			margin: 100px auto 0;
			border-radius: 15px;
			width: 650px;
		}

		@media screen and (min-width: 700px) {}

		@media screen and (max-width: 700px) {
			.button2 {
				width: 60% !important;
			}

			label {
				margin-left: 6% !important;
			}

			.formulario {
				margin-top: 50px !important;
				width: 90% !important;
			}

			.input2 {
				width: 82% !important;
			}

			.input {
				width: 90% !important;
			}
		}

		label,
		h3 {
			font-family: Verdana, sans-serif;
		}

		.input {
			font-size: 13px;
			height: 28px;
			padding-left: 6px;
			background-color: #efecec;
			border: solid 1px #878787;
			border-radius: 4px;
			width: 430px;
		}

		.input2 {
			font-size: 13px;
			height: 28px;
			padding-left: 6px;
			background-color: #efecec;
			border: solid 1px #878787;
			border-radius: 4px;
			width: 430px;
		}


		.button2:hover {
			color: #4cb050;
			background-color: black;
		}

		.button:hover {
			color: #4cb050;
			background-color: black;
		}

		#olho1:hover {
			filter: saturate(0.5);
		}

		#olho2:hover {
			filter: saturate(0.5);
		}

		.login {
			font-weight: bold;
		}

		.button {

			font-weight: bold;
			font-family: Arial;
			color: black;
			padding: 3px 33px;
			text-align: center;
			margin: auto 1px;
			font-size: smaller;
			margin-left: 40px;
			margin-top: 0;
			text-decoration: none;
			border-radius: 5px;
			border: solid black 1px;
			background-color: white;


		}

		.button2 {
			width: 300px;
			border: solid 1.5px black;

			font-weight: bold;
			font-family: Arial;
			color: black;
			padding: 9px;
			font-size: smaller;
			text-decoration: none;
			border-radius: 3px;
			background-color: #4cb050;

		}

		label {
			display: flex;
			margin-left: 88px;
		}
	</style>

	<script>
		var senha1 = $('#senha1');
		var olho1 = $("#olho1");

		olho1.mousedown(function() {
			senha1.attr("type", "text");
		});

		olho1.mouseup(function() {
			senha1.attr("type", "password");
		});
		// para evitar o problema de arrastar a imagem e a senha continuar exposta, 
		//citada pelo nosso amigo nos comentários
		$("#olho1").mouseout(function() {
			$("#senha1").attr("type", "password");
		});

		var senha2 = $('#senha2');
		var olho2 = $("#olho2");

		olho2.mousedown(function() {
			senha2.attr("type", "text");
		});

		olho2.mouseup(function() {
			senha2.attr("type", "password");
		});
		// para evitar o problema de arrastar a imagem e a senha continuar exposta, 
		//citada pelo nosso amigo nos comentários
		$("#olho2").mouseout(function() {
			$("#senha2").attr("type", "password");
		});
	</script>

	<script src="https://kit.fontawesome.com/40cc08f0c1.js" crossorigin="anonymous"></script>
	<?php echo "<script>";
	include_once "/home/vhosts/bar-web.orgfree.com/projeto/user/tools/no-ads.js";
	echo "</script>";?>
</body>

</html>