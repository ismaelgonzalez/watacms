<?php

/**
* User Fixture
*/
class UserFixture extends CakeTestFixture {
	public $import = 'User';

	public $fields = array(
		'id'       => array('type' => 'integer', 'key' => 'primary'),
		'email'    => array('type' => 'string', 'length' => 150),
		'password' => array('type' => 'string', 'length' => 255),
		'role'     => array('type' => 'string', 'length' => 20)
	);

	public $records = array(
		array(
			'id'       => 1,
			'email'    => 'ismael@gmail.com',
			'password' => '12345678',
			'role'     => 'admin'
		),
		array(
			'id'       => 2,
			'email'    => 'ismael2@gmail.com',
			'password' => '12345678',
			'role'     => 'user'
		),
		array(
			'id'       => 3,
			'email'    => 'ismael3@gmail.com',
			'password' => '12345678',
			'role'     => 'user'
		),
	);
}

