<h3><a href="/admin/tags/add/">Agregar Tags</a></h3>
<?php
if (sizeof($tags) < 1) {
	echo "<h4>Por el momento no tenemos Tags el sistema.</h4>";
} else {
	?>
	<div class="tags index table-responsive">
		<h2><?php echo __('Tags'); ?></h2>
		<table class="table table-striped table-hover">
			<thead>
			<tr>
				<th><?php echo $this->Paginator->sort('id'); ?></th>
				<th><?php echo $this->Paginator->sort('tag'); ?></th>
				<th class="actions"><?php echo __('Actions'); ?></th>
			</tr>
			</thead>
			<tbody>
			<?php foreach ($tags as $tag): ?>
				<tr>
					<td><?php echo h($tag['Tag']['id']); ?>&nbsp;</td>
					<td><?php echo h($tag['Tag']['tag']); ?>&nbsp;</td>
					<td class="actions">
						<a href="/admin/tags/edit/<?php echo $tag['Tag']['id']; ?>"><i class="fa fa-fw fa-edit" data-toggle="tooltip" title="Editar Tag"></i></a> |
						<i class="fa fa-fw fa-times-circle text-danger" onclick="borrar(<?php echo $tag['Tag']['id']; ?>)" data-toggle="tooltip" title="Desactivar Tag"></i>
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
<div id="deleteTag" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">WataCMS - Admin</h4>
			</div>
			<div class="modal-body">
				<p>Estas Seguro que quieres borrar este Tag?</p>
				<input id="deleteID" value="" type="hidden">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				<button id="confirmDelete" type="button" class="btn btn-danger">Desactivar Tag</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script type="text/javascript">
	$(function() {
		$("[data-toggle=tooltip]").tooltip({placement: 'right'});

		$("#confirmDelete").click(function() {
			var id = $("#deleteID").val();
			$("#deleteTag").modal('hide');
			window.open('/admin/tags/delete/'+id, '_parent');
		});
	});

	function borrar(post_id) {
		$("#deleteID").val(post_id);
		$("#deleteTag").modal('show');
	}
</script>