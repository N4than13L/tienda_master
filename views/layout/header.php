<!DOCTYPE HTML>
<html lang="es">

<head>
	<meta charset="utf-8" />
	<title>Tienda de Camisetas</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" />
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
	<!-- Custom styles -->
	<link rel="stylesheet" href="<?= base_url ?>assets/css/styles.css" />
</head>

<body>
	<div class="m-2">
		<!-- CABECERA + NAVBAR -->
		<header id="header">
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				<div class="container-fluid">
					<a class="navbar-brand d-flex align-items-center" href="<?= base_url ?>">
						<img src="<?= base_url ?>assets/img/camiseta.png" alt="Camiseta Logo" width="40" height="40" class="d-inline-block align-text-top me-2" />
						Tienda de camisetas
					</a>
					<!-- Sidebar toggle moved to sidebar.php -->
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="mainNavbar">
						<ul class="navbar-nav me-auto mb-2 mb-lg-0">
							<li class="nav-item">
								<a class="nav-link" href="<?= base_url ?>">Inicio</a>
							</li>
							<?php $categorias = Utils::showCategorias(); ?>
							<?php while ($cat = $categorias->fetch_object()): ?>
								<li class="nav-item">
									<a class="nav-link" href="<?= base_url ?>categoria/ver&id=<?= $cat->id ?>"><?= $cat->nombre ?></a>
								</li>
							<?php endwhile; ?>
						</ul>
					</div>
				</div>
			</nav>
		</header>

		<div id="content">