<?php

require_once  __DIR__ . '/vendor/autoload.php';

use JSlomian\htmpl\Template;

$temp = new Template();
$temp->renderView("index", ['asd' => 'dupa','numbers' => [1,2,3,4,5]]);
