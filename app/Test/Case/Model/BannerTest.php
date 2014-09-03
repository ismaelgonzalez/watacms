<?php
App::uses('Banner', 'Model');

/**
 * Banner Test Case
 *
 */
class BannerTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.banner',
		'app.banner_size'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Banner = ClassRegistry::init('Banner');
	}

	public function test_getInstance() {

	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Banner);

		parent::tearDown();
	}

}
