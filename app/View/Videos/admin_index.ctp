<h3><a href="/admin/videos/add/">Agregar Videos</a></h3>
<?php
if (sizeof($videos) < 1) {
	echo "<h4>Por el momento no tenemos Videos en el sistema.</h4>";
} else {
	?>
	<div class="videos index table-responsive">
		<h2><?php echo __('Videos'); ?></h2>
		<table class="table table-striped table-hover">
			<thead>
			<tr>
				<th><?php echo $this->Paginator->sort('id'); ?></th>
				<th><?php echo $this->Paginator->sort('video'); ?></th>
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
			<?php foreach ($videos as $video): ?>
				<tr>
					<td><?php echo h($video['Video']['id']); ?>&nbsp;</td>
					<td><iframe width="150" height="113" src="https://www.youtube.com/embed/<?php echo $video['Video']['video_number']; ?>" frameborder="0" allowfullscreen></iframe>
						<br>
						<a href="<?php echo $video['Video']['video']; ?>" target="_blank"><?php echo $video['Video']['video']; ?></a>&nbsp;
					</td>
					<td><?php echo h($video['Video']['title']); ?>&nbsp;</td>
					<td><?php echo h($video['Video']['blurb']); ?>&nbsp;</td>
					<td>
						<?php echo h($video['Section']['name']); ?>&nbsp;
					</td>
					<td><?php echo $this->Status->getSiNo($video['Video']['is_published']); ?>&nbsp;</td>
					<td><?php echo h($video['Video']['published_date']); ?>&nbsp;</td>
					<td><?php echo h($video['Video']['published_time']); ?>&nbsp;</td>
					<td><?php echo $this->Status->getStatus($video['Video']['status']); ?>&nbsp;</td>
					<td class="actions">
						<a href="/admin/videos/edit/<?php echo $video['Video']['id']; ?>"><i
								class="fa fa-fw fa-edit" data-toggle="tooltip"
								title="Editar Video"></i></a>
						|
						<i class="fa fa-fw fa-times-circle text-danger"
						   onclick="borrar(<?php echo $video['Video']['id']; ?>)"
						   data-toggle="tooltip"
						   title="Desactivar Video"></i>
					</td>
				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
		<p>
			<?php
			echo $this->Paginator->counter(array(
				'format' => __('Pagina {:page} de {:pages}, mostrando {:current} resultados de {:count} en total, empezando con el resultado {:start}, terminando en {:end}')
			));
			?>    </p>
	</div>
<?php
}
?>
<div id="deleteVideo" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">WataCMS - Admin</h4>
			</div>
			<div class="modal-body">
				<p>Estas Seguro que quieres borrar este Video?</p>
				<input id="deleteID" value="" type="hidden">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				<button id="confirmDelete" type="button" class="btn btn-danger">Desactivar Video</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script type="text/javascript">
	$(function() {
		$("[data-toggle=tooltip]").tooltip({placement: 'right'});

		$("#confirmDelete").click(function() {
			var id = $("#deleteID").val();
			$("#deleteVideo").modal('hide');
			window.open('/admin/videos/delete/'+id, '_parent');
		});
	});

	function borrar(post_id) {
		$("#deleteID").val(post_id);
		$("#deleteVideo").modal('show');
	}
</script>