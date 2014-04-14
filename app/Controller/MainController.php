<?php
class MainController extends AppController {

/**
 * Controller name
 *
 * @var string
 */
  public $name = 'Main';

/**
 * This controller does not use a model
 *
 * @var array
 */
  public $mains = array();

/**
 * Displays a view
 *
 * @param mixed What page to display
 * @return void
 */
  public function main() {
    $this->render();
  }

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

	public function beforeFilter()
	{
		parent::beforeFilter();
		$this->Auth->allow('login');
	}

	public function index()
	{
		$this->set('title_for_layout', 'ハピデ　｜ メイン画面');
	}

	public function login() {

		// ログインしてなかったらログイン画面
		// してたらメイン画面
		if(!$this->Auth->user()){
			if($this->request->is('post')) {
				if($this->Auth->login()) {
					return $this->redirect($this->Auth->redirect());
				} else {
					$this->Session->setFlash(__('Username or password is incorrect'), 'default', array(), 'auth');
				}
			}
		} else {
			return $this->redirect($this->Auth->redirect());
		}
	}

	public function logout($id = null) {
		$this->redirect($this->Auth->logout());
	}

}
