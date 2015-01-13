<?php foreach ($poll['PollAnswer'] as $pa) { ?>
	<div class="newAnswer col-md-12 form-group">
		<div class="col-md-3">
			<label for="PollAnswerAnswer">Respuesta</label>
			<input name="answer[]" type="text" id="PollAnswerAnswer" class="form-control" value="<?php echo $pa['answer']; ?>">
		</div>
		<div class="col-md-3">
			<label for="PollAnswerColor">Color</label>
			<select id="PollAnswerColor" name="answerColor[]" class="form-control">
				<option value="">--Elige un Color--</option>
				<option <?php if ($pa['color'] == 'primary') { echo 'selected'; } ?> value="primary">Azul</option>
				<option <?php if ($pa['color'] == 'info') { echo 'selected'; } ?> value="info">Azul Claro</option>
				<option <?php if ($pa['color'] == 'success') { echo 'selected'; } ?> value="success">Verde</option>
				<option <?php if ($pa['color'] == 'warning') { echo 'selected'; } ?> value="warning">Amarillo</option>
				<option <?php if ($pa['color'] == 'danger') { echo 'selected'; } ?> value="danger">Rojo</option>
			</select>
		</div>
	</div>
<?php } ?>