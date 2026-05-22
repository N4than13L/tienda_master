<h1>Gestión de productos</h1>

<a href="<?= base_url ?>producto/crear" class="btn btn-success mb-3 text-white">
	<i class="fa-solid fa-plus"></i>
</a>

<?php if (isset($_SESSION['producto']) && $_SESSION['producto'] == 'complete'): ?>
	<strong class="alert_green">El producto se ha creado correctamente</strong>
<?php elseif (isset($_SESSION['producto']) && $_SESSION['producto'] != 'complete'): ?>
	<strong class="alert_red">El producto NO se ha creado correctamente</strong>
<?php endif; ?>
<?php Utils::deleteSession('producto'); ?>

<?php if (isset($_SESSION['delete']) && $_SESSION['delete'] == 'complete'): ?>
	<strong class="alert_green">El producto se ha borrado correctamente</strong>
<?php elseif (isset($_SESSION['delete']) && $_SESSION['delete'] != 'complete'): ?>
	<strong class="alert_red">El producto NO se ha borrado correctamente</strong>
<?php endif; ?>
<?php Utils::deleteSession('delete'); ?>

<table>
	<tr>
		<th>Identificador</th>
		<th>Nombre</th>
		<th>Precio</th>
		<th>Stock</th>
		<th>Acciones</th>
	</tr>
	<?php if (isset($productos) && $productos): ?>
		<?php while ($pro = $productos->fetch_object()): ?>
			<tr>
				<td><?= $pro->id; ?></td>
				<td><?= $pro->nombre; ?></td>
				<td><?= $pro->precio; ?></td>
				<td><?= $pro->stock; ?></td>
				<td>
					<a href="<?= base_url ?>producto/editar&id=<?= $pro->id ?>" class="button button-gestion"><i class="fa-regular fa-pen-to-square"></i></a>
					<a href="<?= base_url ?>producto/eliminar&id=<?= $pro->id ?>" class="button button-gestion button-red"><i class="fa-solid fa-trash"></i></a>
				</td>
			</tr>
		<?php endwhile; ?>
	<?php else: ?>
		<tr>
			<td colspan="5">No hay productos para mostrar.</td>
		</tr>
	<?php endif; ?>
</table>