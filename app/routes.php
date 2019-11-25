<?php

use Pecee\SimpleRouter\SimpleRouter;

require_once 'helpers.php';

SimpleRouter::setDefaultNamespace('App\Controllers');

SimpleRouter::get('/contacts', 'ContactController@index');
SimpleRouter::get('/contacts/create', 'ContactController@create');
SimpleRouter::post('/contacts', 'ContactController@store');

SimpleRouter::start();