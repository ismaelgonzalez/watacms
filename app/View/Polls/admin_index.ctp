<h3><a href="/admin/polls/add/">Agregar Encuestas</a></h3>
<?php
if (sizeof($polls) < 1) {
	echo "<h4>Por el momento no tenemos Encuestas en el sistema.</h4>";
} else {
	?>
	<div class="polls index table-responsive">
		<h2><?php echo __('Encuestas'); ?></h2>
		<table class="table table-striped table-hover">
			<thead>
			<tr>
				<th><?php echo $this->Paginator->sort('id'); ?></th>
				<th><?php echo $this->Paginator->sort('question', 'Pregunta'); ?></th>
				<th><?php echo $this->Paginator->sort('blurb', 'Descripción'); ?></th>
				<th><?php echo $this->Paginator->sort('published_date', 'Fecha de Publicación'); ?></th>
				<th><?php echo $this->Paginator->sort('published_time', 'Hora de Publicación'); ?></th>
				<th><?php echo $this->Paginator->sort('status'); ?></th>
				<th class="actions"><?php echo __('Actions'); ?></th>
			</tr>
			</thead>
			<tbody>
			<?php foreach ($polls as $poll): ?>
				<tr>
					<td><?php echo h($poll['Poll']['id']); ?>&nbsp;</td>
					<td><?php echo h($poll['Poll']['question']); ?>&nbsp;</td>
					<td><?php echo h($poll['Poll']['blurb']); ?>&nbsp;</td>
					<td><?php echo date('d/M/Y', strtotime($poll['Poll']['published_date'])); ?>&nbsp;</td>
					<td><?php echo date('h:i A', strtotime($poll['Poll']['published_time'])); ?>&nbsp;</td>
					<td><?php echo $this->Status->getStatus($poll['Poll']['status']); ?>&nbsp;</td>
					<td class="actions">
						<a href="/admin/polls/edit/<?php echo $poll['Poll']['id']; ?>"><i class="fa fa-fw fa-edit" data-toggle="tooltip" title="Editar Imagen"></i></a> |
						<i class="fa fa-fw fa-times-circle text-danger" onclick="borrar(<?php echo $poll['Poll']['id']; ?>)" data-toggle="tooltip" title="Desactivar Imagen"></i>
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
<div id="deletePoll" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">WataCMS - Admin</h4>
			</div>
			<div class="modal-body">
				<p>Estas Seguro que quieres borrar esta Encuesta?</p>
				<input id="deleteID" value="" type="hidden">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				<button id="confirmDelete" type="button" class="btn btn-danger">Desactivar Encuesta</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script type="text/javascript">
	$(function() {
		$("[data-toggle=tooltip]").tooltip({placement: 'right'});

		$("#confirmDelete").click(function() {
			var id = $("#deleteID").val();
			$("#deletePoll").modal('hide');
			window.open('/admin/polls/delete/'+id, '_parent');
		});
	});

	function borrar(post_id) {
		$("#deleteID").val(post_id);
		$("#deletePoll").modal('show');
	}
</script>