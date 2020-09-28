<?php

namespace Source\Core;

class Controller {
  protected function load(string $view, $params = []) {
    $twig = new \Twig\Environment(
      new \Twig\Loader\FilesystemLoader('../source/Views')
    );

    $twig->addGlobal('BASE', BASE);
    echo $twig->render($view.'.twig.php', $params);
  }
}
