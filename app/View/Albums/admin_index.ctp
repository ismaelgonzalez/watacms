<h3><a href="/admin/albums/add/">Agregar Galerías</a></h3>
<?php
if (sizeof($albums) < 1) {
	echo "<h4>Por el momento no tenemos Galerias en el sistema.</h4>";
} else {
	?>
	<div class="pics index table-responsive">
		<h2><?php echo __('$albums'); ?></h2>
		<table class="table table-striped table-hover">
			<thead>
			<tr>
				<th><?php echo $this->Paginator->sort('id'); ?></th>
				<th><?php echo $this->Paginator->sort('title', 'Título'); ?></th>
				<th><?php echo $this->Paginator->sort('blurb', 'Descripción'); ?></th>
				<th><?php echo $this->Paginator->sort('section_id', 'Sección'); ?></th>
				<th><?php echo $this->Paginator->sort('is_published', 'Mostrar como Publicado'); ?></th>
				<th><?php echo $this->Paginator->sort('published_date', 'Fecha de Publicación'); ?></th>
				<th><?php echo $this->Paginator->sort('published_time', 'Hora de Publicación'); ?></th>
				<th><?php echo $this->Paginator->sort('status'); ?></th>
				<th class="actions"><?php echo __('Actions'); ?></th>
			</tr>
			</thead>
			<tbody>
			<?php foreach ($albums as $pic): ?>
				<tr>
					<td><?php echo h($pic['Album']['id']); ?>&nbsp;</td>
					<td><?php echo h($pic['Album']['title']); ?>&nbsp;</td>
					<td><?php echo h($pic['Album']['blurb']); ?>&nbsp;</td>
					<td><?php echo h($pic['Section']['name']); ?>&nbsp;</td>
					<td><?php echo $this->Status->getSiNo($pic['Album']['is_published']); ?>&nbsp;</td>
					<td><?php echo date('d/M/Y', strtotime($pic['Album']['published_date'])); ?>&nbsp;</td>
					<td><?php echo date('h:i A', strtotime($pic['Album']['published_time'])); ?>&nbsp;</td>
					<td><?php echo $this->Status->getStatus($pic['Album']['status']); ?>&nbsp;</td>
					<td class="actions">
						<a href="/admin/albums/edit/<?php echo $pic['Album']['id']; ?>"><i class="fa fa-fw fa-edit" data-toggle="tooltip" title="Editar Imagen"></i></a> |
						<i class="fa fa-fw fa-times-circle text-danger" onclick="borrar(<?php echo $pic['Album']['id']; ?>)" data-toggle="tooltip" title="Desactivar Imagen"></i> |
						<a href="/admin/photos/add/<?php echo $pic['Album']['id']; ?>"><i class="fa fa-fw fa-camera" data-toggle="tooltip" title="Agregar Imagenes"></i></a> |
						<a href="/admin/albums/view/<?php echo $pic['Album']['id']; ?>"><i class="fa fa-fw fa-file-picture-o" data-toggle="tooltip" title="Ver Fotos"></i></a>
					</td>
				</tr>
			<?php endforeach; ?>
			</tbody>
			<tfoot>
			<td colspan="9"><?php echo $this->Paginator->numbers(array('separator' => ' ')); ?></td>
			</tfoot>
		</table>
		<p>
			<?php
			echo $this->Paginator->counter(array(
				'format' => __('Pagina {:page} de {:pages}, mostrando {:current} resultados de {:count} en total, empezando con el resultado {:start}, terminando en {:end}')
			));
			?>	</p>
	</div>
<?php } ?>
<div id="deleteAlbum" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">WataCMS - Admin</h4>
			</div>
			<div class="modal-body">
				<p>Estas Seguro que quieres borrar esta Imagen?</p>
				<input id="deleteID" value="" type="hidden">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				<button id="confirmDelete" type="button" class="btn btn-danger">Desactivar Imagen</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script type="text/javascript">
	$(function() {
		$("[data-toggle=tooltip]").tooltip({placement: 'right'});

		$("#confirmDelete").click(function() {
			var id = $("#deleteID").val();
			$("#deleteAlbum").modal('hide');
			window.open('/admin/$albums/delete/'+id, '_parent');
		});
	});

	function borrar(post_id) {
		$("#deleteID").val(post_id);
		$("#deleteAlbum").modal('show');
	}
</script>