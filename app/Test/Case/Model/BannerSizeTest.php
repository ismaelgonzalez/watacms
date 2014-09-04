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
		$banner_size= $this->BannerSize->find('first', array('recursive' => -1));
		$expected = '728x90';

		$this->assertEquals($expected, $banner_size['BannerSize']['size']);

		$all_banner_size= $this->BannerSize->find('all', array('recursive' => -1));
		$this->assertCount(2, $all_banner_size);
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
