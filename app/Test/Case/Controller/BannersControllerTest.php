<?php
App::uses('BannersController', 'Controller');

/**
 * BannersController Test Case
 *
 */
class BannersControllerTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.banner',
		'app.banner_size'
	);

	public function setUp()
	{
		parent::setUp();
		$this->Banner = ClassRegistry::init('Banner');
	}

/**
 * testIndex method
 *
 * @return void
 */
	public function testIndex() {
		$result = $this->testAction('/banners/index', array('return' => 'result'));
		$this->assertNull($result);
	}

/**
 * testAdminIndex method
 *
 * @return void
 */
	public function testAdminIndex() {
		$banner = array(
			'Banner' => array(
				'name' => 'banner 3',
				'link' => 'http://www.link.com',
				'pic' => '',
				'start_date' => '2014-09-02',
				'end_date' => '2014-09-22',
				'is_adsense' => 1,
				'adsense_code' => 'This is the adsense code',
				'banner_size_id' => 1,
				'status' => 0
			)
		);
		$this->testAction('/admin/banners/add', array('data' => $banner, 'method' => 'post'));

		$result = $this->testAction('/admin/banners/index', array('return' => 'vars'));
		$this->assertCount(2, $result['banners']);
	}

/**
 * testAdminAdd method
 *
 * @return void
 */
	public function testAdminAdd() {
		$banner = array(
			'Banner' => array(
				'name' => 'banner 3',
				'link' => 'http://www.link.com',
				'pic' => '',
				'start_date' => '2014-09-02',
				'end_date' => '2014-09-22',
				'is_adsense' => 1,
				'adsense_code' => 'This is the adsense code',
				'status' => 1,
				'banner_size_id' => 2,
			)
		);
		$this->testAction('/admin/banners/add', array('data' => $banner, 'method' => 'post'));

		$result = $this->testAction('/admin/banners/index', array('return' => 'vars'));
		$this->assertCount(3, $result['banners']);
	}

/**
 * testAdminEdit method
 *
 * @return void
 */
	public function testAdminEdit() {
		$banner = array(
			'Banner' => array(
				'id' => 1,
				'name' => 'banner Gobierno',
				'link' => 'http://www.sonora.gob',
				'start_date' => '2014-09-02',
				'end_date' => '2014-09-22',
				'is_adsense' => 1,
				'adsense_code' => 'this would be the code',
				'status' => 1,
				'banner_size_id' => 1,
			)
		);
		$this->testAction('/admin/banners/edit/1', array('data' => $banner, 'method' => 'post'));

		$result = $this->testAction('/admin/banners/edit/1', array('return' => 'vars', 'method' => 'get'));

		$this->assertEquals($banner['Banner']['name'], $result['banner']['Banner']['name']);
		$this->assertEquals($banner['Banner']['link'], $result['banner']['Banner']['link']);
		$this->assertEquals($banner['Banner']['adsense_code'], $result['banner']['Banner']['adsense_code']);
	}

/**
 * testAdminDelete method
 *
 * @return void
 */
	public function testAdminDelete() {
		$this->testAction('/admin/banners/delete/1', array('method' => 'post'));

		$result = $this->testAction('/admin/banners/index', array('return' => 'vars'));
		$this->assertCount(1, $result['banners']);
	}

}
