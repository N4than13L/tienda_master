<!-- BARRA LATERAL: Offcanvas (móvil) + sidebar estático (escritorio) -->
<!-- Sidebar toggle (visible on small screens): fixed button for easy access -->
<button class="btn btn-primary d-lg-none position-fixed mt-5" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSidebar" aria-controls="offcanvasSidebar" aria-label="Abrir menú" style="top:1rem; left:1rem; z-index:1080;">
	&#9776;
</button>

<!-- Offcanvas para pantallas pequeñas -->
<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasSidebar" aria-labelledby="offcanvasSidebarLabel">
	<div class="offcanvas-header">
		<h5 class="offcanvas-title" id="offcanvasSidebarLabel">Menú</h5>
		<button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Cerrar"></button>
	</div>
	<div class="offcanvas-body">
		<!-- CATEGORÍAS (offcanvas) -->
		<div class="mb-3">
			<h5>Categorías</h5>
			<div class="list-group">
				<a href="<?= base_url ?>" class="list-group-item list-group-item-action">Inicio</a>
				<?php $categorias_off = Utils::showCategorias(); ?>
				<?php while ($cat_off = $categorias_off->fetch_object()): ?>
					<a href="<?= base_url ?>categoria/ver&id=<?= $cat_off->id ?>" class="list-group-item list-group-item-action"><?= $cat_off->nombre ?></a>
				<?php endwhile; ?>
			</div>
		</div>

		<!-- CARRO DE LA COMPRA (offcanvas) -->
		<div id="carrito-offcanvas" class="block_aside">
			<h3>Mi carrito</h3>
			<ul>
				<?php $stats = Utils::statsCarrito(); ?>
				<li><a href="<?= base_url ?>carrito/index">Productos (<?= $stats['count'] ?>)</a></li>
				<li><a href="<?= base_url ?>carrito/index">Total: <?= $stats['total'] ?> $</a></li>
				<li><a href="<?= base_url ?>carrito/index">Ver el carrito</a></li>
			</ul>
		</div>

		<!-- LOGIN / MENÚ (offcanvas) -->
		<div id="login-offcanvas" class="block_aside">
			<?php if (!isset($_SESSION['identity'])): ?>
				<h3>Entrar a la web</h3>
				<form action="<?= base_url ?>usuario/login" method="post">
					<label for="email">Email</label>
					<input type="email" name="email" />
					<label for="password">Contraseña</label>
					<input type="password" name="password" />
					<input type="submit" value="Enviar" />
				</form>
			<?php else: ?>
				<h3><?= $_SESSION['identity']->nombre ?> <?= $_SESSION['identity']->apellidos ?></h3>
			<?php endif; ?>
			<ul>
				<?php if (isset($_SESSION['admin'])): ?>
					<li><a href="<?= base_url ?>categoria/index">Gestionar categorias</a></li>
					<li><a href="<?= base_url ?>producto/gestion">Gestionar productos</a></li>
					<li><a href="<?= base_url ?>pedido/gestion">Gestionar pedidos</a></li>
				<?php endif; ?>

				<?php if (isset($_SESSION['identity'])): ?>
					<li><a href="<?= base_url ?>pedido/mis_pedidos">Mis pedidos</a></li>
					<li><a href="<?= base_url ?>usuario/logout">Cerrar sesión</a></li>
				<?php else: ?>
					<li><a href="<?= base_url ?>usuario/registro">Registrate aqui</a></li>
				<?php endif; ?>
			</ul>
		</div>
	</div>
</div>

<!-- Sidebar visible en pantallas grandes -->
<aside id="lateral" class="d-none d-lg-block">

	<!-- CARRO DE LA COMPRA -->
	<div id="carrito" class="block_aside">
		<h3>Mi carrito</h3>
		<ul>
			<?php $stats = Utils::statsCarrito(); ?>
			<li><a href="<?= base_url ?>carrito/index">Productos (<?= $stats['count'] ?>)</a></li>
			<li><a href="<?= base_url ?>carrito/index">Total: <?= $stats['total'] ?> $</a></li>
			<li><a href="<?= base_url ?>carrito/index">Ver el carrito</a></li>
		</ul>
	</div>

	<div id="login" class="block_aside">

		<!-- FORMULARIO DE LOGIN -->
		<?php if (!isset($_SESSION['identity'])): ?>
			<h3>Entrar a la web</h3>
			<form action="<?= base_url ?>usuario/login" method="post">
				<label for="email">Email</label>
				<input type="email" name="email" />
				<label for="password">Contraseña</label>
				<input type="password" name="password" />
				<input type="submit" value="Enviar" />
			</form>
		<?php else: ?>
			<h3><?= $_SESSION['identity']->nombre ?> <?= $_SESSION['identity']->apellidos ?></h3>
		<?php endif; ?>
		<ul>
			<!-- MENÚ DE ADMINISTRACIÓN -->
			<?php if (isset($_SESSION['admin'])): ?>
				<li><a href="<?= base_url ?>categoria/index">Gestionar categorias</a></li>
				<li><a href="<?= base_url ?>producto/gestion">Gestionar productos</a></li>
				<li><a href="<?= base_url ?>pedido/gestion">Gestionar pedidos</a></li>
			<?php endif; ?>

			<?php if (isset($_SESSION['identity'])): ?>
				<li><a href="<?= base_url ?>pedido/mis_pedidos">Mis pedidos</a></li>
				<li><a href="<?= base_url ?>usuario/logout">Cerrar sesión</a></li>
			<?php else: ?>
				<li><a href="<?= base_url ?>usuario/registro">Registrate aqui</a></li>
			<?php endif; ?>
		</ul>
	</div>
</aside>

<!-- CONTENIDO CENTRAL -->
<div class="card m-4 p-4 d-flex flex-column">