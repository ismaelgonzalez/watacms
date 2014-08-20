<h3><a href="/admin/users/add/">Agregar Usuarios</a></h3>
<?php
if (sizeof($users) < 1) {
	echo "<h4>Por el momento no tenemos usuarios en el sistema.</h4>";
} else {
	?>
	<div class="table-responsive">
		<table class="table table-striped table-hover">
			<thead>
			<tr>
				<th>Nombre</th>
				<th>Email</th>
				<th>Rol</th>
				<th>Status</th>
				<th></th>
			</tr>
			</thead>
			<tbody>
			<?php foreach($users as $u) { ?>
				<tr>
					<td><?php echo $u['Author']['name'] . ' ' . $u['Author']['last_name']; ?></td>
					<td><?php echo $u['User']['email']; ?></td>
					<td><?php echo $this->Status->getRole($u['User']['role']); ?></td>
					<td><?php echo $this->Status->getStatus($u['User']['status']); ?></td>
					<td>
						<a href="/admin/users/edit/<?php echo $u['User']['id']; ?>"><i class="icon-edit" data-toggle="tooltip" title="Editar Usuario">Edit</i></a> |
						<i class="icon-remove-sign delete" onclick="borrar(<?php echo $u['User']['id']; ?>)" data-toggle="tooltip" title="Desactivar Usuario">Delete</i> |
						Tal vez algo de agregar usuario
					</td>
				</tr>
			<?php } ?>
			</tbody>
			<tfoot>
			<td colspan="5"><?php echo $this->Paginator->numbers(); ?></td>
			</tfoot>
		</table>
	</div>
<?php } ?>
<div id="deleteUser" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">WataCMS - Admin</h4>
			</div>
			<div class="modal-body">
				<p>Estas Seguro que quieres borrar este Usuario?</p>
				<input id="deleteID" value="" type="hidden">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				<button id="confirmDelete" type="button" class="btn btn-danger">Desactivar Usuario</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script type="text/javascript">
	$(document).ready(function() {
		$("[data-toggle=tooltip]").tooltip({placement: 'right'});

		$("#confirmDelete").click(function() {
			var id = $("#deleteID").val();
			$("#deleteUser").modal('hide');
			window.open('/admin/users/delete/'+id, '_parent');
		});
	});

	function borrar(post_id) {
		$("#deleteID").val(post_id);
		$("#deleteUser").modal('show');
	}
</script>