<?php
class IndexController extends AppController {

/**
 * Controller name
 *
 * @var string
 */
  public $name = 'Index';

/**
 * This controller does not use a model
 *
 * @var array
 */
	public
		$uses = Array('User'),
		$components = Array(
			'Session',
			'Auth' => Array(
				'loginRedirect' => Array('controller'  => 'main', 'action' => 'index'),
				'logoutRedirect' => Array('controller' => 'main', 'action' => 'login'),
				'loginAction' => Array('controller' => 'main', 'action' => 'login'),
				'authenticate' => Array('Form' => Array('fields' => Array('username' => 'email')))
			)
		);

/**
 * Displays a view
 *
 * @param mixed What page to display
 * @return void
 */
  public function index() {
		if(!$this->Auth->user()){
			$this->render();
		} else {
			$this->redirect(array('controller' => 'main', 'action' => 'index'));
		}
  }
}
