<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Security\Lib\Services\Model\Perangkat;
use Security\Lib\Services\Model\Akun;
use Security\Lib\Services\Mysql\MysqlOperation;
use Security\Lib\Services\Mssql\MssqlOperation;

class Test
{

    protected $operation;

    public function __construct()
    {
        $operation = new MssqlOperation();
        $this->operation = $operation;
    }

    public function addPerangkat()
    {
        $perangkat = new Perangkat();

        $perangkat->setNomor("123456");
        $perangkat->setDeskripsi("Test");

        $this->operation->addPerangkat($perangkat);
    }

    public function addAkun()
    {
        $akun = new Akun();
        $akun->setIdAkun("onny");
        $akun->setDeskripsi("Test");
        $this->operation->addAkun($akun);
    }
    
    public function addPerangkatDanAkun()
    {
        /**
         * select by id dulu biar dapat id untuk relasi
         */
        $perangkat = new Perangkat();
        $perangkat->setNomor(123456);
        $akun =  new Akun();
        $akun->setIdAkun("onny");
        $this->operation->addPerangkatDanAkun($perangkat, $akun);
    }
    
    public function testSqlSrv()
    {
        $conn = new \Security\Config\Connection();
        $koneksi = $conn->pdoSqlSrvConn();
        print_r($koneksi);
    }
}


$test = new Test();
$test->addAkun();