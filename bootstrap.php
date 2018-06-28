<?php
require 'vendor/autoload.php';
require 'app/functions/helpers.php';

use app\src\Bind;
use app\models\Connection;

$config = (object) require 'config.php';
$connection = new Connection;

Bind::set('config_db', $config);
Bind::set('connection', Connection::connect());