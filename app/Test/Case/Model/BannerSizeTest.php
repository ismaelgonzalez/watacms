<?php
App::uses('BannerSize', 'Model');

/**
 * BannerSize Test Case
 *
 */
class BannerSizeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.banner_size',
		'app.banner'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->BannerSize = ClassRegistry::init('BannerSize');
	}

	public function test_getInstance() {

	}
/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->BannerSize);

		parent::tearDown();
	}

}
