<?php
echo $this->Form->create('User', array('type'=>'post', 'class' => 'form-signin'));
echo "<h2 class='form-sigin-heading'>Ingresar</h2>";
echo $this->Form->input('email', array('label' => '', 'placeholder' => "Dirección de Correo", 'class' => 'input-block-level'));
echo $this->Form->input('password', array('label' => '', 'placeholder' => "Clave de Acceso", 'class' => 'input-block-level'));

echo $this->Form->submit('Ingresar', array('formnovalidate' => true, 'class' => 'btn btn-large btn-inverse'));
echo $this->Form->end();

?>