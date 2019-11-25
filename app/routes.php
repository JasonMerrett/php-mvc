<?php

use Pecee\SimpleRouter\SimpleRouter;

require_once 'helpers.php';

SimpleRouter::setDefaultNamespace('App\Controllers');

SimpleRouter::post('/test', 'ContactController@test');

SimpleRouter::start();