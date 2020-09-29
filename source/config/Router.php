<?php


$this->get('/', 'PagesController@home');
$this->get('/cadastro', 'PagesController@cadastro');
$this->post('/cadastrar', 'CandidateController@save');