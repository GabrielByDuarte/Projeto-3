<!DOCTYPE html>
<html>

<head>
	<title>Bar 800K</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">


	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body class="fundo">
	<?php require_once '/home/vhosts/bar-web.orgfree.com/projeto/config/config_index.php';

	?>

	<div class="box-formulario">
		<div class="formulario">

			<br />
			<form action="" method="get" autocomplete="on" class="login">
				<img class="ufo" src="http://bar-web.orgfree.com/projeto/user/images/ufo.webp" alt="">
				<img class="alien-img" src="http://bar-web.orgfree.com/projeto/user/images/alien.webp" alt="">
				<h3 class="login">


					ENTRAR NA CONTA
				</h3>
				<hr class="hr">
				<br>
				<label for="nome">E-mail/ CPF:</label>

				<div class="box-input"><i class="fa-solid fa-user"></i><input class="input" type="text" name="ID" id="ID" placeholder="Digite seu e-mail/CPF..." required /></div>
				<br />
				<br />
				<label for="senha">Senha:</label>

				<div class="box-input"><i class="fa-solid fa-lock"></i><input class="input" type="password" name="senha" id="senha" placeholder="Digite sua senha..." required /></div>

				<br />
				<br />

				<input class="button2" type="submit" value="Entrar" name="login" /><br><br><br>
				<hr class="hr2">
				<div class="cadastrese">
					<p> Ainda não tem conta?</p>
					<a class="button" href="http://bar-web.orgfree.com/projeto/config/logout.php">Cadastre-se</a>
				</div>
			</form>

		</div>
	</div>
	<style>
		.alien-img {
			width: 70px;
		}


		.box-input i {
			margin-right: 10px;
		}

		.sem-perfil img {
			border-radius: 100%;
			width: 110px;
		}

		@media only screen and (max-width: 700px) {
			.box-input {
				display: flex;
				margin: 0 15px;
			}
		}

		@media only screen and (min-width: 700px) {

			.ufo {
				width: 180px;
				position: fixed;
				top: -10%;
				left: -10%;
				animation: 5s linear pulse infinite;
			}
		}

		@keyframes pulse {
			0% {
				filter: drop-shadow(2px 4px 6px #9e1515);
			}

			18% {
				filter: drop-shadow(2px 4px 6px #c6b921);
			}

			36% {
				filter: drop-shadow(2px 4px 6px #43c621);
			}

			53% {
				filter: drop-shadow(2px 4px 6px #21c6ae);
			}

			68% {
				filter: drop-shadow(2px 4px 6px #2135c6);
			}

			85% {
				filter: drop-shadow(2px 4px 6px #c621af);
			}

			100% {
				filter: drop-shadow(2px 4px 6px #c6212f);
			}



		}

		* {
			font-family: 'Roboto', sans-serif;
			box-sizing: border-box;
		}

		@media only screen and (max-width: 700px) {
			.ufo {
				display: none;
			}

			label {
				margin-left: 6% !important;
			}

			.formulario {
				width: 90% !important;
			}

			.olheira {
				width: 84% !important;
			}

			.button {
				margin-left: 10px !important;
			}

			.input2 {
				width: 82% !important;
			}

			.input {
				width: 90% !important;
			}

			.button {
				padding: 3px 5px !important;
			}

			.button2 {
				width: 60% !important;
			}



		}

		#olho {
			cursor: pointer;
		}

		.hr {
			margin: 0 auto;
			width: 80%;
		}

		.hr2 {
			margin: 0;
		}


		.cadastrese {
			border-radius: 0 0 13px 13px;
			padding: 20px 0;
			background-color: #4cb050;
			display: flex;
			border: 1.5px dashed;
			justify-content: center;
		}

		html,
		body {
			color: black;
			background: linear-gradient(270deg, rgba(118,185,82,1) 56%, rgba(178,221,154,1) 100%);
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

		@media screen and (max-width: 700px) {}



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

		.olheira {
			font-size: 13px;
			height: 28px;
			padding-left: 6px;
			background-color: #efecec;
			border: solid 1px #152740;
			border-radius: 4px;
			width: 430px;
		}

		#olho:hover {
			filter: saturate(0.5);
		}

		.login {
			font-weight: bold;
		}

		.button2:hover {
			color: #4cb050;
			background-color: black;
		}

		.button:hover {
			color: #4cb050;
			background-color: black;
		}

		.button {

			font-weight: bold;
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
			background-color: silver;


		}

		.button2 {
			width: 300px;
			border: solid 1px black;

			font-weight: bold;
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

		body {
			display: block;

			height: 1000px;
		}
	</style>
	<script src="https://kit.fontawesome.com/40cc08f0c1.js" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
	<?php echo "<script>";include_once "/home/vhosts/bar-web.orgfree.com/projeto/user/tools/no-ads.js";
	 echo "</script>";?>
</body>

</html>