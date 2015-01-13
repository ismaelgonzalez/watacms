<div class="polls form">
	<?php echo $this->Form->create('Poll',
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
		<legend><?php echo __('Admin Agregar Encuesta'); ?></legend>
		<?php
		echo $this->Form->input('question', array(
			'label' => array('text' => 'Pregunta', 'class' => 'control-label my-label col-lg-2'),
			'class' => 'form-control',
			'between' => '<div class="col-lg-4">',
		));
		echo $this->Form->input('blurb', array(
			'label' => array('text' => 'Descripción', 'class' => 'control-label my-label col-lg-2'),
			'type' => 'text',
			'class' => 'form-control',
			'between' => '<div class="col-lg-4">',
		));
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
		?>
		<div class="panel panel-success">
			<div class="panel-heading">Respuestas de la Encuesta</div>
			<div class="panel-body">
				<p>
					<a id="addAnswer" class="btn btn-success">
						<i class="fa fa-2x fa-plus"></i>
					</a> Agregar Respuesta a la Encuesta
				</p>
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
		$('#PollPublishedDate').datepicker({dateFormat: 'dd-mm-yy'});

		$("#addAnswer").click(function(){
			$(this).parent().before('<div class="newAnswer col-md-12 form-group">' +
			'<div class="col-md-3">' +
			'<label for="PollAnswerAnswer">Respuesta</label>' +
			'<input name="answer[]" type="text" id="PollAnswerAnswer" class="form-control">' +
			'</div>' +
			'<div class="col-md-3">' +
			'<label for="PollAnswerColor">Color</label>' +
			'<select id="PollAnswerColor" name="answerColor[]" class="form-control">' +
			'<option value="">--Elige un Color--</option>' +
			'<option value="primary">Azul</option>' +
			'<option value="info">Azul Claro</option>' +
			'<option value="success">Verde</option>' +
			'<option value="warning">Amarillo</option>' +
			'<option value="danger">Rojo</option>' +
			'</select>' +
			'</div>' +
			'</div>');
		});
	});
</script>