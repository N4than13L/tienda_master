<h1>Gestionar categorias</h1>

<a href="<?= base_url ?>categoria/crear" class="btn btn-success mb-3 text-white">
	<i class="fa-solid fa-plus"></i>
</a>

<table>
	<tr>
		<th>Identificador</th>
		<th>Nombre</th>
	</tr>
	<?php $categorias = $categorias ?? false; ?>
	<?php if ($categorias): ?>
		<?php while ($cat = $categorias->fetch_object()): ?>
			<tr>
				<td><?= $cat->id; ?></td>
				<td><?= $cat->nombre; ?></td>
			</tr>
		<?php endwhile; ?>
	<?php endif; ?>
</table>