<?php

require_once __DIR__ . '/../vendor/autoload.php';

class Test
{

    /**
     * Contoh tambah perangkat
     * @return type
     */
    public function createPerangkat()
    {
        $createPerangkat = new \Security\Lib\Services\Security\PerangkatCreator();
        $data = [
            "id_perangkat" => time(),
            "deskripsi_perangkat" => "",
            "delete_at" => null,
            "last_update" => date('Y-m-d H:i:s'),
            'create_at' => date('Y-m-d H:i:s'), //strtotime('2019-02-01 00:00:00')),// current = date('Y-m-d H:i:s')
            'create_by' => 'test'
        ];

        $result = $createPerangkat->create($data);

        return $result;
    }

    /**
     * Contoh tambah akun
     */
    public function createAkun()
    {
        $createAkun = new \Security\Lib\Services\Security\AkunCreator();
        $data = [
            "id_akun" => time(),
            "deskripsi_akun" => "",
            "delete_at" => null,
            "last_update" => date('Y-m-d H:i:s'),
            'create_at' => date('Y-m-d H:i:s'), //strtotime('2019-02-01 00:00:00')),// current = date('Y-m-d H:i:s')
            'create_by' => 'test'
        ];

        $result = $createAkun->create($data);
        return $result;
    }

    /**
     * Contoh tambah akun dan perangkat
     */
    public function createAkunDanPerangkat()
    {
        $createAkunDanPerangkat = new \Security\Lib\Services\Security\AkunPerangkatCreator();
        $data = [
            'id_akun' => "1560310387",
            'id_perangkat' => "1560313600",
            "delete_at" => null,
            "last_update" => date('Y-m-d H:i:s'),
            'create_at' => date('Y-m-d H:i:s'), //strtotime('2019-02-01 00:00:00')),// current = date('Y-m-d H:i:s')
            'create_by' => 'test'
        ];
        $result = $createAkunDanPerangkat->create($data);
        return $result;
    }

    /**
     * Contoh tambah session 
     */
    public function createSession()
    {
        $createSession = new \Security\Lib\Services\Security\SessionCreator();
        $data = [
            'token' => md5(time()),
            'id_perangkat_dan_akun' => 5,
            'expired' => date("Y-m-d H:i:s"),
            'login_at' => date("Y-m-d H:i:s"),
            'logout_at' => null
        ];
        $result = $createSession->create($data);
        return $result;
    }

}

$test = new Test();
$data = $test->createSession();

print_r($data);
