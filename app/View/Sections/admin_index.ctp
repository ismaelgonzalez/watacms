<h3><a href="/admin/sections/add/">Agregar Secciones</a></h3>
<?php
if (sizeof($sections) < 1) {
	echo "<h4>Por el momento no tenemos secciones en el sistema.</h4>";
} else {
	?>
	<div class="sections index table-responsive">
		<h2><?php echo __('Sections'); ?></h2>
		<table class="table table-striped table-hover">
			<thead>
			<tr>
				<th><?php echo $this->Paginator->sort('id'); ?></th>
				<th><?php echo $this->Paginator->sort('name', 'Nombre'); ?></th>
				<th><?php echo $this->Paginator->sort('parent_id', 'Sección Titular'); ?></th>
				<th class="actions"><?php echo __('Actions'); ?></th>
			</tr>
			</thead>
			<tbody>
			<?php foreach ($sections as $banner): ?>
				<tr>
					<td><?php echo h($banner['Section']['id']); ?>&nbsp;</td>
					<td><?php echo h($banner['Section']['name']); ?>&nbsp;</td>
					<td><?php echo h($banner['Section']['parent_id']); ?>&nbsp;</td>
					<td class="actions">
						<a href="/admin/sections/edit/<?php echo $banner['Section']['id']; ?>"><i class="fa fa-fw fa-edit" data-toggle="tooltip" title="Editar Sección"></i></a> |
						<i class="fa fa-fw fa-times-circle text-danger" onclick="borrar(<?php echo $banner['Section']['id']; ?>)" data-toggle="tooltip" title="Desactivar Sección"></i>
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
<div id="deleteSection" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">WataCMS - Admin</h4>
			</div>
			<div class="modal-body">
				<p>Estas Seguro que quieres borrar esta Sección?</p>
				<input id="deleteID" value="" type="hidden">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				<button id="confirmDelete" type="button" class="btn btn-danger">Desactivar Sección</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script type="text/javascript">
	$(function() {
		$("[data-toggle=tooltip]").tooltip({placement: 'right'});

		$("#confirmDelete").click(function() {
			var id = $("#deleteID").val();
			$("#deleteSection").modal('hide');
			window.open('/admin/sections/delete/'+id, '_parent');
		});
	});

	function borrar(post_id) {
		$("#deleteID").val(post_id);
		$("#deleteSection").modal('show');
	}
</script>