<?php

namespace Source\Controllers;


class PagesController {
  
  public function home()
  {
    $this->load('home/main');
  }

  public function cadastro()
  {
    $this->load('cadastro/main');
  }

  protected function load(string $view, $params = []) {
    $twig = new \Twig\Environment(
      new \Twig\Loader\FilesystemLoader('../source/Views')
    );

    $twig->addGlobal('BASE', BASE);
    $twig->addGlobal('ACCEPTED_FILES', ACCEPT_FILES);
    echo $twig->render($view.'.twig.php', $params);
  }
}