<?php
$this->TinyMCE->editor(array('theme' => 'advanced', 'mode' => 'textareas', 'theme_advanced_toolbar_location' => 'top', 'theme_advanced_buttons3' => ''));
?>
<div class="posts form">
	<?php echo $this->Form->create('Post',
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
		<legend><?php echo __('Admin Agregar Nota'); ?></legend>
		<?php
		echo $this->Form->input('id', array());
		echo $this->Form->input('title', array(
			'label' => array('text' => 'Título', 'class' => 'control-label my-label col-lg-2'),
			'class' => 'form-control',
			'between' => '<div class="col-lg-4">',
		));
		echo $this->Form->input('blurb', array(
			'label' => array('text' => 'Descripción', 'class' => 'control-label my-label col-lg-2'),
			'type' => 'text',
			'class' => 'form-control',
			'between' => '<div class="col-lg-4">',
		));
		echo $this->Form->input('body', array(
			'label' => array('text' => 'Texto', 'class' => 'control-label my-label col-lg-2'),
			'type' => 'text',
			'class' => 'form-control',
			'between' => '<div class="col-lg-4">',
			'rows' => 20
		));
		echo '<h3>show/edit pic</h3>';
		/*echo $this->Form->input('pic', array(
			'label' => array('text' => 'Imagen', 'class' => 'control-label my-label col-lg-2'),
			'type'  => 'file',
			'class' => 'form-control',
			'between' => '<div class="col-lg-4">',
			'before' => '<div class="form-group pic-image">',
		));*/
		echo $this->Form->input('pic_blurb', array(
			'label' => array('text' => 'Pie de Imagen', 'class' => 'control-label my-label col-lg-2'),
			'type' => 'text',
			'class' => 'form-control',
			'between' => '<div class="col-lg-4">',
		));

		echo '<h3>show add pic</h3>';
		echo '<h3>show add gallery</h3>';
		echo '<h3>show add video</h3>';

		echo $this->Form->input('published_date', array(
			'label' => array('text' => 'Fecha de Publicación', 'class' => 'control-label my-label col-lg-2'),
			'type' => 'text',
			'between' => '<div class="col-lg-2">',
		));
		$time = $this->Timeoptions->getTimeOptions();

		echo $this->Form->input('published_time', array(
			'label' => array('text' => 'Hora de Publicación', 'class' => 'control-label my-label col-lg-2'),
			'type' => 'select',
			'between' => '<div class="col-lg-2">',
			'options' => array(
				$time,
			),
			'empty' => array(0 => '-- Publicar Ahora --'),
		));
		echo $this->Form->input('section_id', array(
			'label' => array('text' => 'Sección', 'class' => 'control-label my-label col-lg-2'),
			'type' => 'select',
			'between' => '<div class="col-lg-4">',
			'options' => array(
				$sections,
			),
			'empty' => array('' => '-- Seleccionar Sección --'),
		));
		echo $this->Form->input('tags', array(
			'class' => 'tagsinput',
			'label' => array('text' => 'Agregar Tags', 'class' => 'control-label my-label col-lg-2'),
			'between' => '<div class="col-lg-8">',
		));
		echo $this->Form->input('tagged', array('type' => 'hidden'));
		echo '<h3>fix tagged</h3>';
		?>
		<div class="form-group">
			<label class="control-label my-label col-lg-2" style="padding-top: 0">Mostrar como Publicado</label>
			<div class="col-lg-4">
				<label for="PostIsPublished1">Si</label>
				<input type="radio" name="data[Post][is_published]" id="PostIsPublished1" value="1" checked="checked">
				<label for="PostIsPublished0">No</label>
				<input type="radio" name="data[Post][is_published]" id="PostIsPublished0" value="0">
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
		$('#PostPublishedDate').datepicker({dateFormat:'dd-mm-yy'});
		$("[id*='Tags']").autocomplete({source: '/tags/autocomplete/', minlength:2, select: function (event, ui){
			if (ui.item != null) {
				var label = "<span id='tag"+ui.item.id+"' class='badge tag'>"+ui.item.value+"<a onclick='deltag("+ui.item.id+")'>x</a></span>";
				$(this).parent().append(label);
				$("[id*='Tagged']").val(function(e, val) {
					return val + (val ? ',' : '') + ui.item.id
				});
				$(this).val("");
				return false;
			}
		}});
		$("[id*='Tags']").keypress(function(e){
			if (e.which == 13) {
				e.preventDefault();
				var new_tag = $(this).val();
				var label = "<span id='tag"+new_tag+"' class='badge tag'>"+new_tag+"<a onclick='deltag(\""+new_tag+"\")'>x</a></span>";
				$(this).parent().append(label);
				$("[id*='Tagged']").val(function(e, val) {
					return val + (val ? ',' : '') + new_tag
				});
				this.value = "";
				return false;
			}
		});
	});

	function deltag(tag_id){
		$("#tag"+tag_id).remove();
		var arrTags = $("[id*='Tagged']").val().split(',');

		for(i=0; i< arrTags.length; i++){
			console.log(arrTags[i]);
			if (arrTags[i] == tag_id){
				arrTags.splice(i, 1);
			}
		}

		$("[id*='Tagged']").val(arrTags.toString());
	}
</script>