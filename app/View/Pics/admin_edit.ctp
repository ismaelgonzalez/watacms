<div class="pics form">
	<?php echo $this->Form->create('Pic',
		array(
			'type' => 'file',
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
	?>
	<fieldset>
		<legend><?php echo __('Admin Agregar Imagen'); ?></legend>
		<?php
		echo $this->Form->input('id', array(
			'default' => $pic['Pic']['id'],
		));
		?>
		<div class="form-group">
			<div class="col-lg-6" style="text-align: right">
				<p>
					Imagen actual: <?php echo $pic['Pic']['pic']; ?>
					<?php $this->Thumbs->pic_thumbnail($pic, 300); ?>
				</p>
				<p></p>
			</div>
		</div>
		<?php
		echo $this->Form->input('pic', array(
			'label' => array('text' => 'Imagen', 'class' => 'control-label my-label col-lg-2'),
			'type'  => 'file',
			'class' => 'form-control',
			'between' => '<div class="col-lg-4">',
			'before' => '<div class="form-group pic-image">',
			'default' => $pic['Pic']['pic'],
		));
		echo $this->Form->input('title', array(
			'label' => array('text' => 'Título', 'class' => 'control-label my-label col-lg-2'),
			'class' => 'form-control',
			'between' => '<div class="col-lg-4">',
			'default' => $pic['Pic']['title'],
		));
		echo $this->Form->input('blurb', array(
			'label' => array('text' => 'Descripción', 'class' => 'control-label my-label col-lg-2'),
			'type' => 'text',
			'class' => 'form-control',
			'between' => '<div class="col-lg-4">',
			'default' => $pic['Pic']['blurb'],
		));
		echo $this->Form->input('published_date', array(
			'label' => array('text' => 'Fecha de Publicación', 'class' => 'control-label my-label col-lg-2'),
			'type' => 'text',
			'between' => '<div class="col-lg-2">',
			'default' => $pic['Pic']['published_date'],
		));
		$time = $this->Timeoptions->getTimeOptions();

		$minute = date('i', strtotime($pic['Pic']['published_time']));
		if ($minute != '00') {
			$default_time = 0;
			echo $this->Form->hidden('time_is_set', array('default' => 1));
		} else {
			$default_time = date('H', strtotime($pic['Pic']['published_time']));
		}
		echo $this->Form->input('published_time', array(
			'label' => array('text' => 'Hora de Publicación', 'class' => 'control-label my-label col-lg-2'),
			'type' => 'select',
			'between' => '<div class="col-lg-2">',
			'options' => array(
				$time,
			),
			'empty' => array(0 => '-- Publicar Ahora --'),
			'default' => $default_time,
		));
		echo $this->Form->input('section_id', array(
			'label' => array('text' => 'Sección', 'class' => 'control-label my-label col-lg-2'),
			'type' => 'select',
			'between' => '<div class="col-lg-4">',
			'options' => array(
				$sections,
			),
			'empty' => array('' => '-- Seleccionar Sección --'),
			'default' => $pic['Pic']['section_id'],
		));
		?>
		<div class="form-group">
			<label class="control-label my-label col-lg-2" style="padding-top: 0">Mostrar como Publicado</label>
			<div class="col-lg-4">
				<label for="PicIsPublished1">Si</label>
				<input type="radio" name="data[Pic][is_published]" id="PicIsPublished1" value="1" checked="checked">
				<label for="PicIsPublished0">No</label>
				<input type="radio" name="data[Pic][is_published]" id="PicIsPublished0" value="0">
			</div>
		</div>
	</fieldset>
	<?php
	echo "<div class='form-group col-lg-5'>";
	echo $this->Form->submit('Enviar', array('formnovalidate' => true, 'class' => 'btn btn-success'));
	echo "</div>";
	echo $this->Form->end();
	?>
</div>
<script type="text/javascript">
	$(function () {
		$('#PicPublishedDate').datepicker({dateFormat:'dd-mm-yy'});
	});
</script>