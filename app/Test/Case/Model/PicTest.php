<?php
App::uses('Pic', 'Model');

/**
 * Pic Test Case
 *
 */
class PicTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.pic',
		'app.section',
		'app.tagged'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Pic = ClassRegistry::init('Pic');
	}

	public function testCreate() {
		$pic = array(
			'Pic' => array(
				'pic' => '',
				'title' => 'Title 4',
				'blurb' => 'Lorem ipsum dolor sit amet',
				'section_id' => 1,
				'is_published' => 0,
				'published_date' => '2014-09-13',
				'published_time' => '14:41:50',
				'status' => 1),
		);

		$this->Pic->save($pic);

		$pics = $this->Pic->find('all');
		$this->assertCount(4, $pics);
	}

	public function testEdit() {
		$pic = array(
			'Pic' => array(
				'id' => 1,
				'title' => 'New Title',
				'section_id' => 3,
				'pic' => '',
				'published_date' => '2014-09-13',
				'published_time' => '14:41:50',
			),
		);

		$this->Pic->save($pic);

		$modified_pic = $this->Pic->findById(1);

		$this->assertEquals($pic['Pic']['title'], $modified_pic['Pic']['title']);
		$this->assertEquals($pic['Pic']['section_id'], $modified_pic['Pic']['section_id']);
	}

	public function testFind() {
		$pic = $this->Pic->findById(1);

		$this->assertEquals('Title 1', $pic['Pic']['title']);
		$this->assertEquals('1', $pic['Pic']['section_id']);
		$this->assertEquals('image1.jpg', $pic['Pic']['pic']);
	}
 /**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Pic);

		parent::tearDown();
	}

}
