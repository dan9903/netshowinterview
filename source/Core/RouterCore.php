<?php

namespace Source\Core;

class RouterCore {
  private $uri;
  private $method;
  private $getArr = [];
  private $postArr = [];

  public function __construct() {
    $this->intialize();
    require __DIR__. '/../config/Router.php';
    $this->execute();
  }

  private function intialize() {
    $this->method = $_SERVER['REQUEST_METHOD'];
    $uri = $_SERVER['REQUEST_URI'];
    $this->uri = str_replace(BASE, '/', $uri);
  }

  private function get($router, $call) {
    $this->getArr[] = [
      'router' => $router,
      'call' => $call
    ];
  }
  
  private function post($router, $call) {
    $this->postArr[] = [
      'router' => $router,
      'call' => $call
    ];
  }

  private function execute() {
    switch ($this->method) {
      case 'GET':
        $this->executeGet();  
      break;
      case 'POST':
        $this->executePost();
      break;
    }
  }

  private function executeGet() {
    foreach ($this->getArr as $get) {
      if( $get['router'] == $this->uri ) {
        if(is_callable($get['call'])) {
          $get['call']();
          break;
        } else {
          $this->executeController($get['call']);
        }
      }
    }
  }

  private function executePost() {
    $args []=[
      'post' => $_POST,
      'document' => $_FILES['document']
    ];
    foreach ($this->postArr as $post) {
      if( $post['router'] == $this->uri ) {
        if(is_callable($post['call'])) {
          $post['call']();
          break;
        } else  {
          $this->executeController($post['call'], $args);
        }
      }
    }
  }

  private function executeController($call, $args=[]) {
    $ex = explode('@', $call);
    $cont = 'Source\\Controllers\\' . $ex[0];
    
    if( (!isset($ex[0]) || !isset($ex[1]) ) || ((!class_exists($cont)) || (!method_exists($cont, $ex[1])))) {
      (new \Source\Controllers\MessageController)->message('Dados inválidos', 404);
      return;
    }
    call_user_func_array([new $cont,$ex[1]], $args);
  }
}
