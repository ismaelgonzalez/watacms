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
		$banner = $this->Banner->find('first');
		$this->assertArrayHasKey('Banner', $banner);

		$expected = 'http://www.link.com';
		$this->assertEquals($expected, $banner['Banner']['link']);

		$expected_size = '728x90';
		$this->assertEquals($expected_size, $banner['BannerSize']['size']);
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
