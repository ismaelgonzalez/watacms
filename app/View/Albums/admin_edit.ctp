<div class="albums form">
	<?php echo $this->Form->create('Album',
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
		<legend><?php echo __('Admin Editar Album'); ?></legend>
		<?php
		echo $this->Form->input('id', array(
			'default' => $album['Album']['id']
		));
		echo $this->Form->input('title', array(
			'label' => array('text' => 'Título', 'class' => 'control-label my-label col-lg-2'),
			'class' => 'form-control',
			'between' => '<div class="col-lg-4">',
			'default' => $album['Album']['title']
		));
		echo $this->Form->input('blurb', array(
			'label' => array('text' => 'Descripción', 'class' => 'control-label my-label col-lg-2'),
			'type' => 'text',
			'class' => 'form-control',
			'between' => '<div class="col-lg-4">',
			'default' => $album['Album']['blurb']
		));
		echo $this->Form->input('published_date', array(
			'label' => array('text' => 'Fecha de Publicación', 'class' => 'control-label my-label col-lg-2'),
			'type' => 'text',
			'between' => '<div class="col-lg-2">',
			'default' => $album['Album']['published_date']
		));
		$time = $this->Timeoptions->getTimeOptions();
		$minute = date('i', strtotime($album['Album']['published_time']));
		if ($minute != '00') {
			$default_time = 0;
			echo $this->Form->hidden('time_is_set', array('default' => 1));
		} else {
			$default_time = date('H', strtotime($album['Album']['published_time']));
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
			'default' => $album['Album']['section_id']
		));
		echo $this->Form->input('tags', array(
			'class' => 'tagsinput',
			'label' => array('text' => 'Agregar Tags', 'class' => 'control-label my-label col-lg-2'),
			'between' => '<div class="col-lg-8">',
			'type' => 'text'
		));
		$tag_labels = $this->Tags->getTags($tags);
		echo "<div class='form-group'><span class='col-lg-2' style='text-align: right'><strong>Tags actuales:</strong></span><div class='col-lg-8'>".$tag_labels."</div></div>";
		$tagged = $this->Tags->getTagsIds($tags);
		echo $this->Form->input('tagged', array('type' => 'hidden', 'default' => $tagged));
		?>
		<div class="form-group">
			<label class="control-label my-label col-lg-2" style="padding-top: 0">Mostrar como Publicado</label>
			<div class="col-lg-4">
				<label for="AlbumIsPublished1">Si</label>
				<input type="radio" name="data[Album][is_published]" id="AlbumIsPublished1" value="1" checked="checked">
				<label for="AlbumIsPublished0">No</label>
				<input type="radio" name="data[Album][is_published]" id="AlbumIsPublished0" value="0">
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
		$('#AlbumPublishedDate').datepicker({dateFormat:'dd-mm-yy'});
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