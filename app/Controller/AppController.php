<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	public $components = array(
		'DebugKit.Toolbar',
		'Session',
		'Auth' => array(
			//TODO: change this redirect
			'loginRedirect' => '/', //array('controller' => '/', 'action' => 'dashboard'),
			'logoutRedirect' => '/', //array('controller' => 'users', 'action' => 'login'),
			'authorize' => 'Controller',
			'authError' => "No tienes acceso a esta area.",
		),
	);

	public function beforeFilter() {
		$this->Auth->allow(array('display', 'login'));
		$this->Auth->flash['params']['class'] = 'alert alert-danger';
		$this->Auth->autoRedirect = false;
	}
}
