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
			$(this).parent().before('<p><label for="PollAnswerAnswer">Respuesta</label><div class="input added"><input name="answer[]" type="text" id="PollAnswerAnswer"></div></p>');

			/*$(this).parent().before('<div class="clearfix"></div>' +
			'<div class="js-answer-bar-colors">' +
			'<p><label for="PollAnswerAnswer">Respuesta</label><div class="input added"><input name="answer[]" type="text" id="PollAnswerAnswer"></div></p>' +
			'<div class="clearfix"></div>' +
			'<div class="row pull-left col-md-4">' +
			'Elige color de la respuesta:' +
			'<span><img src="/img/red.png" alt="red"> <input type="radio" name="color" value="red.png"></span>' +
			'<span><img src="/img/yellow.png" alt="red"> <input type="radio" name="color" value="yellow.png"></span>' +
			'<span><img src="/img/green.png" alt="red"> <input type="radio" name="color" value="green.png"></span>' +
			'<span><img src="/img/blue.png" alt="red"> <input type="radio" name="color" value="blue.png"></span>' +
			'</div>' +
			'</div>');
			//$(this).parent().before($('.js-answer-bar-colors').clone());*/
		});
	});
</script>