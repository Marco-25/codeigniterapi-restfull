<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!doctype html>
<html lang="pt-BR">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,700;1,300&display=swap" rel="stylesheet">

	<title>API | REST</title>

	<style>
		body { font-family: 'Roboto', sans-serif;}
		.li-config {
			display: flex;
			align-items: center;
		}

		.li-config p {
			padding: 0;
			margin: 0;
			font-size: 1rem;
			letter-spacing: .2rem;
			text-decoration: underline;
			font-style: italic;
		}

		.li-config span {
			margin-right: 1rem;
			color: black;
			font-weight: bolder;
			font-size: 1rem;
			width: 3.6rem;
			padding: 0 .5rem;
		}
		.green {background-color: #009900;}
		.red {background-color: #c63c3c;}
		.blue {background-color: #5454e5;}
		.orange {background-color: #ffa500;}

		footer {
			display: flex;
			justify-content: center;
			padding: 1rem;
			background-color: lightgray;
		}
	</style>
</head>
<body>
<div class="jumbotron jumbotron-fluid">
	<div class="container">
		<h1 class="display-4">API | Restfull Com CodeIgniter</h1>
		<p class="lead">Api simples com CRUD padrão.</p>
		<p class="lead">Todos os dados são fornecido em Json e para realizar requisições POST e PUT somente por meio de Json.</p>
	</div>
</div>

<div class="container">
	<ul class="list-group">
		<h4>links para clientes</h4>
		<li class="list-group-item li-config">
			<span class="blue">POST</span>
			<p>https://nossoprodutodigital.com/api/clientes</p>
		</li>

		<li class="list-group-item li-config">
			<span class="green">GET</span>
			<p>https://nossoprodutodigital.com/api/clientes/</p>
		</li>

		<li class="list-group-item li-config">
			<span class="green">GET</span>
			<p>https://nossoprodutodigital.com/api/clientes/id</p>
		</li>

		<li class="list-group-item li-config">
			<span class="orange">PUT</span>
			<p>https://nossoprodutodigital.com/api/clientes/id</p>
		</li>

		<li class="list-group-item li-config">
			<span class="red">DEL</span>
			<p>https://nossoprodutodigital.com/api/clientes/id</p>
		</li>
	</ul>
	<hr>

	<ul class="list-group">
		<h4>links para Veiculos</h4>
		<li class="list-group-item li-config">
			<span class="blue">POST</span>
			<p>https://nossoprodutodigital.com/api/veiculos</p>
		</li>

		<li class="list-group-item li-config">
			<span class="green">GET</span>
			<p>https://nossoprodutodigital.com/api/veiculos/</p>
		</li>

		<li class="list-group-item li-config">
			<span class="green">GET</span>
			<p>https://nossoprodutodigital.com/api/veiculos/id</p>
		</li>

		<li class="list-group-item li-config">
			<span class="orange">PUT</span>
			<p>https://nossoprodutodigital.com/api/veiculos/id</p>
		</li>

		<li class="list-group-item li-config">
			<span class="red">DEL</span>
			<p>https://nossoprodutodigital.com/api/veiculos/id</p>
		</li>
	</ul>
	<hr>

	<ul class="list-group">
		<h4>links para rastreadores</h4>
		<li class="list-group-item li-config">
			<span class="blue">POST</span>
			<p>https://nossoprodutodigital.com/api/rastreados</p>
		</li>

		<li class="list-group-item li-config">
			<span class="green">GET</span>
			<p>https://nossoprodutodigital.com/api/rastreados/</p>
		</li>

		<li class="list-group-item li-config">
			<span class="green">GET</span>
			<p>https://nossoprodutodigital.com/api/rastreados/id</p>
		</li>

		<li class="list-group-item li-config">
			<span class="orange">PUT</span>
			<p>https://nossoprodutodigital.com/api/rastreados/id</p>
		</li>

		<li class="list-group-item li-config">
			<span class="red">DEL</span>
			<p>https://nossoprodutodigital.com/api/rastreados/id</p>
		</li>
	</ul>
</div>
<div style="height: 100px"></div>

<footer>
	<p>Todos os direitos reservados &copy; - 2021</p>
</footer>


<!--	jquery   -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

</body>
</html>
