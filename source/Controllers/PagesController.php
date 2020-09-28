<?php

namespace Source\Controllers;

use Source\Core\Controller;

class PagesController extends Controller
{
    public function home()
    {
        $this->load('home/main');
    }

    public function cadastro()
    {
        $this->load('cadastro/main');
    }
    
}
