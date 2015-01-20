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
		<legend><?php echo __('Admin Editar Encuesta'); ?></legend>
		<?php
		echo $this->Form->input('id', array(
			'default' => $poll['Poll']['id']
		));
		echo $this->Form->input('question', array(
			'label' => array('text' => 'Pregunta', 'class' => 'control-label my-label col-lg-2'),
			'class' => 'form-control',
			'between' => '<div class="col-lg-4">',
			'default' => $poll['Poll']['question']
		));
		echo $this->Form->input('blurb', array(
			'label' => array('text' => 'Descripción', 'class' => 'control-label my-label col-lg-2'),
			'type' => 'text',
			'class' => 'form-control',
			'between' => '<div class="col-lg-4">',
			'default' => $poll['Poll']['blurb']
		));
		echo $this->Form->input('published_date', array(
			'label' => array('text' => 'Fecha de Publicación', 'class' => 'control-label my-label col-lg-2'),
			'type' => 'text',
			'between' => '<div class="col-lg-2">',
			'default' => $poll['Poll']['published_date']
		));

		$time = $this->Timeoptions->getTimeOptions();
		$minute = date('i', strtotime($poll['Poll']['published_time']));
		if ($minute != '00') {
			$default_time = 0;
			echo $this->Form->hidden('time_is_set', array('default' => 1));
		} else {
			$default_time = date('H', strtotime($poll['Poll']['published_time']));
		}

		echo $this->Form->input('published_time', array(
			'label' => array('text' => 'Hora de Publicación', 'class' => 'control-label my-label col-lg-2'),
			'type' => 'select',
			'between' => '<div class="col-lg-2">',
			'options' => array(
				$time,
			),
			'empty' => array(0 => '-- Publicar Ahora --'),
			'default' => $default_time
		));
		?>
		<div class="panel panel-success">
			<div class="panel-heading">Respuestas de la Encuesta</div>
			<div class="panel-body">
				<?php foreach ($poll['PollAnswer'] as $pa) { ?>
				<div class="newAnswer col-md-12 form-group js-answer-<?php echo $pa['id']; ?>">
					<div class="col-md-3">
						<label for="PollAnswerAnswer">Respuesta</label>
						<input type="hidden" name="answerId[]" value="<?php echo $pa['id']; ?>">
						<input name="answer[]" type="text" id="PollAnswerAnswer" class="form-control" value="<?php echo $pa['answer']; ?>">
					</div>
					<div class="col-md-3">
						<label for="PollAnswerColor">Color</label>
						<select id="PollAnswerColor" name="answerColor[]" class="form-control">
							<option <?php if ($pa['color'] == 'primary') { echo 'selected'; } ?> value="primary">Azul</option>
							<option <?php if ($pa['color'] == 'info') { echo 'selected'; } ?> value="info">Azul Claro</option>
							<option <?php if ($pa['color'] == 'success') { echo 'selected'; } ?> value="success">Verde</option>
							<option <?php if ($pa['color'] == 'warning') { echo 'selected'; } ?> value="warning">Amarillo</option>
							<option <?php if ($pa['color'] == 'danger') { echo 'selected'; } ?> value="danger">Rojo</option>
						</select>
					</div>
					<div class="col-md-3">
						<label for="PollAnswerNumVotes">Numero de Votos</label>
						<input name="answerNumVotes[]" id="PollAnswerNumVotes" class="form-control" value="<?php echo $pa['num_votes']; ?>">
					</div>
					<div class="col-md-3 borrarPollAnswer">
						<label>Borrar</label><br>
						<a class="btn btn-danger deletePollAnswer" data-poll-answer-id="<?php echo $pa['id']; ?>">
							<i class="fa fa-fw fa-times-circle"></i>
						</a>
					</div>
				</div>
				<?php } ?>
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

		$('.deletePollAnswer').click(function() {
			var $poll_answer_id = $(this).data('poll-answer-id');

			$.ajax({
				type: 'post',
				url: '/admin/poll_answers/delete/' + $poll_answer_id,
				success: function(html) {
					if (html==='ok') {
						$('.js-answer-' + $poll_answer_id).fadeOut('slow');
					} else {
						alert('Error al querer borrar esta respuesta, intenta de nuevo');
					}
				}
			});
			console.log($(this).data('poll-answer-id'));
		});
	});
</script>