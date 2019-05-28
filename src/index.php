<?php 

require_once __DIR__ . '/../vendor/autoload.php';

use Security\Lib\Services\Model\Perangkat;
use Security\Lib\Services\Mysql\MysqlOperation;

$operation = new MysqlOperation();
$perangkat =  new Perangkat();

$perangkat->setNomor("123456");
$perangkat->setDeskripsi("Test");

$operation->addPerangkat($perangkat);