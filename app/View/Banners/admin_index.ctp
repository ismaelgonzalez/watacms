<h3><a href="/admin/banners/add/">Agregar Banners</a></h3>
<?php
if (sizeof($banners) < 1) {
	echo "<h4>Por el momento no tenemos banners en el sistema.</h4>";
} else {
?>
<div class="banners index table-responsive">
	<h2><?php echo __('Banners'); ?></h2>
	<table class="table table-striped table-hover">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('link'); ?></th>
			<th><?php echo $this->Paginator->sort('start_date'); ?></th>
			<th><?php echo $this->Paginator->sort('end_date'); ?></th>
			<th><?php echo $this->Paginator->sort('is_adsense'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th><?php echo $this->Paginator->sort('banner_size_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($banners as $banner): ?>
	<tr>
		<td><?php echo h($banner['Banner']['id']); ?>&nbsp;</td>
		<td><?php echo h($banner['Banner']['name']); ?>&nbsp;</td>
		<td><?php echo h($banner['Banner']['link']); ?>&nbsp;</td>
		<td><?php echo h($banner['Banner']['start_date']); ?>&nbsp;</td>
		<td><?php echo h($banner['Banner']['end_date']); ?>&nbsp;</td>
		<td><?php echo $this->Status->getSiNo($banner['Banner']['is_adsense']); ?>&nbsp;</td>
		<td><?php echo $this->Status->getStatus($banner['Banner']['status']); ?>&nbsp;</td>
		<td>
			<?php echo $banner['BannerSize']['size']; ?>
		</td>
		<td class="actions">
			<a href="/admin/banners/edit/<?php echo $banner['Banner']['id']; ?>"><i class="fa fa-fw fa-edit" data-toggle="tooltip" title="Editar Banner"></i></a> |
			<i class="fa fa-fw fa-times-circle text-danger" onclick="borrar(<?php echo $banner['Banner']['id']; ?>)" data-toggle="tooltip" title="Desactivar Banner"></i>
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
<div id="deleteBanner" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">WataCMS - Admin</h4>
			</div>
			<div class="modal-body">
				<p>Estas Seguro que quieres borrar este Banner?</p>
				<input id="deleteID" value="" type="hidden">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				<button id="confirmDelete" type="button" class="btn btn-danger">Desactivar Banner</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script type="text/javascript">
	$(function() {
		$("[data-toggle=tooltip]").tooltip({placement: 'right'});

		$("#confirmDelete").click(function() {
			var id = $("#deleteID").val();
			$("#deleteBanner").modal('hide');
			window.open('/admin/banners/delete/'+id, '_parent');
		});
	});

	function borrar(post_id) {
		$("#deleteID").val(post_id);
		$("#deleteBanner").modal('show');
	}
</script>