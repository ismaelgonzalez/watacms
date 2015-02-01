<h3>Fotos del Album: <strong><?php echo $album['Album']['title'];?></strong></h3>
	<div class="row js-masonry" id="container-grid">
		<!--<ul class="thumbnails">-->
			<?php foreach($album['Photo'] as $f){ ?>
			<!--<li>-->
			<div class="col-lg-3 col-md-4 col-xs-6">
				<div class="thumbnail">
					<img class="img-responsive" src="/files/photos/<?php echo $f['pic']; ?>" alt="<?php echo $f['title']; ?>">
					<div class="caption">
						<p>
							<?php echo $f['title']; ?>
							<small><?php echo $f['blurb']; ?></small>
						</p>
						<p>
							<a href="/admin/photos/edit/<?php echo $f['id']; ?>" class="btn btn-primary">Editar</a>
							<a onclick="borrar(<?php echo $f['id']; ?>)" class="btn btn-danger">Borrar</a>
						</p>
					</div>
				</div>
			</div>
			<!--</li>-->
			<?php } ?>
		<!--</ul>-->
	</div>
<div class="row">
	<a href="/admin/albums/index" class="btn btn-info">Regresar</a>
</div>
<script type="text/javascript">
	$(function(){
		var $container = $('#container-grid');
		// initialize
		$container.masonry({
			columnWidth: 200,
			itemSelector: '.item'
		});
	});

    function borrar(album_id) {
        var choice = confirm("¿Estas seguro que quieres borrar esta foto?");

        if (choice) {
            window.open('/admin/photos/delete/'+album_id, '_parent');
        }
    }
</script>