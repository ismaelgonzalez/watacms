<?php
echo $this->Form->Create('User',
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
	)
);
echo $this->Form->input('id', array(
	'default' => $user['User']['id'],
));
echo $this->Form->input('Author.id', array(
	'default' => $user['Author']['id'],
));
echo $this->Form->input('Author.name', array(
	'label' => array('text' => 'Nombre', 'class' => 'control-label my-label col-lg-2'),
	'class' => 'form-control',
	'between' => '<div class="col-lg-4">',
	'default' => $user['Author']['name'],
));
echo $this->Form->input('Author.last_name', array(
	'label' => array('text' => 'Apellido', 'class' => 'control-label my-label col-lg-2'),
	'class' => 'form-control',
	'between' => '<div class="col-lg-4">',
	'default' => $user['Author']['last_name'],
));
echo $this->Form->input('email', array(
	'label' => array('text' => 'Email', 'class' => 'control-label my-label col-lg-2'),
	'class' => 'form-control',
	'between' => '<div class="col-lg-4">',
	'default' => $user['User']['email'],
));
echo $this->Form->input('password', array(
	'label' => array('text' => 'Password', 'class' => 'control-label my-label col-lg-2'),
	'class' => 'form-control',
	'between' => '<div class="col-lg-4">',
));
echo $this->Form->input('role', array(
	'label' => array('text' => 'Rol', 'class' => 'control-label my-label col-lg-2'),
	'class' => 'form-control',
	'options' => array(
		"" => "-- Elegir Rol --",
		'admin' => 'Admin',
		'editor' => 'Editor',
	),
	'default' => $user['User']['role'],
));
echo $this->Form->input('Author.bio', array(
	'type' => 'textarea',
	'label' => array('text' => 'Biografía', 'class' => 'control-label my-label col-lg-2'),
	'class' => 'form-control',
	'between' => '<div class="col-lg-4">',
	'default' => $user['Author']['bio'],
));

if (!empty($user['Author']['pic'])) {
	echo "<div class='row'>";
	$this->Thumbs->user_thumbnail($user, 250);
	echo "</div>";
}

echo $this->Form->input('Author.pic', array(
	'type' => 'file',
	'label' => array('text' => 'Foto', 'class' => 'control-label my-label col-lg-2'),
	'class' => 'form-control',
	'between' => '<div class="col-lg-4">',
));
echo $this->Form->input('Author.social_media', array(
	'label' => array('text' => 'Redes Sociales', 'class' => 'control-label my-label col-lg-2'),
	'class' => 'form-control',
	'between' => '<div class="col-lg-4">',
	'default' => $user['Author']['social_media'],
));

echo "<div class='form-group col-lg-5'>";
echo $this->Form->submit('Enviar', array('formnovalidate' => true, 'class' => 'btn btn-success'));
echo "</div>";
echo $this->Form->end();
?>