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
  public $uses = array();

/**
 * Displays a view
 *
 * @param mixed What page to display
 * @return void
 */
  public function index() {
    $this->render();
  }
}
