<h4>Editar Foto</h4>

<div class="well">
	<?php
	echo $this->Form->create('Photo', array(
		'type'=>'file',
		'id'=>'addPhoto',
		'class' => 'form-horizontal',
		'role' => 'form',
		'inputDefaults' => array(
			'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
			'div' => array('class' => 'form-group'),
			'class' => array('form-control'),
			'label' => array('class' => 'col-lg-2 control-label'),
			'between' => '<div class="col-lg-2">',
			'after' => '</div>',
			'error' => array('attributes' => array('wrap' => 'div', 'class' => 'alert alert-danger')),
		)
	));
	echo $this->Form->input('id', array('value'=> $photo['Photo']['id']));
	echo $this->Form->input('album_id', array(
		'options' => array(
			$albums
		),
		'default' => $photo["Photo"]["album_id"],
		'label' => array('text' => 'Album', 'class' => 'control-label my-label col-lg-2'),
		'class' => 'form-control',
		'between' => '<div class="col-lg-4">',
	));
	?>
	<div class="col-lg-offset-2 fileupload fileupload-new" data-provides="fileupload">
		<div class="fileupload-new thumbnail" style="width: 600px; height: 450px;"><img src="/files/photos/<?php echo $photo["Photo"]["pic"]; ?>" /></div>
		<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 600px; max-height: 450px; line-height: 20px;"></div>
		<div>
		<span class="btn btn-file">
			<span class="btn btn-default fileupload-new">Cambiar Imagen</span>
			<span class="btn btn-default fileupload-exists">Cambiar</span>
			<input type="file" id="pic" name="data[Photo][pic]"/>
		</span>
			<a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Quitar</a>
		</div>
	</div>
	<?php
	echo $this->Form->input('title', array(
		'label' => array('text' => 'T&iacute;tulo', 'class' => 'control-label my-label col-lg-2'),
		'class' => 'form-control',
		'between' => '<div class="col-lg-4">',
		'default' => $photo["Photo"]["title"]
	));
	echo $this->Form->input('blurb', array(
		'label' => array(
			'text' => 'Blurb',
			'class' => 'control-label my-label col-lg-2'),
		'type' => 'text',
		'class' => 'form-control',
		'between' => '<div class="col-lg-4">',
		'default' => $photo["Photo"]["blurb"]
	));

	echo $this->Form->submit('Enviar', array('formnovalidate' => true, 'class' => 'btn btn-success'));
	?>
	<p style="margin-top: 10px;"><a href="/admin/albums/view/<?php echo $photo["Photo"]["album_id"]; ?>" class="btn btn-info">Regresar</a></p>
	<?php
	echo $this->Form->end();
	?>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		$(".fileupload").fileupload();
	});
</script>