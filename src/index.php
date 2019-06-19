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
            "tipe_perangkat" => 1,
            "deskripsi_lokasi_perangkat" => "-",
            "deskripsi_perangkat" => "-",
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

class RemoverTest
{

    /**
     * return false if fail
     */
    public function removeAkun()
    {
        $akunRemover = new \Security\Lib\Services\AkunRemover();
        $akunRemover->remove('1560310387');
    }

    /**
     * return false if fail
     */
    public function unremoveAkun()
    {
        $akunRemover = new \Security\Lib\Services\AkunRemover();
        $akunRemover->unRemove('1560310387');
    }

    public function removePerangkat()
    {
        $perangkarRemover = new \Security\Lib\Services\PerangkatRemover();
        $perangkarRemover->remove('1560313600');
    }

    public function unRemovePerangkat()
    {
        $perangkarRemover = new \Security\Lib\Services\PerangkatRemover();
        $perangkarRemover->unRemove('1560313600');
    }

    public function removeAkunPerangkat()
    {
        $akunPerangkatRemover = new \Security\Lib\Services\Security\AkunPerangkatRemover();
        $akunPerangkatRemover->remove(5);
    }

    public function unRemoveAkunPerangkat()
    {
        $akunPerangkatRemover = new \Security\Lib\Services\Security\AkunPerangkatRemover();
        $akunPerangkatRemover->unRemove(5);
    }

}

class ReaderTest
{

    public function getPerangkat()
    {
        $perangkat = new \Security\Lib\Services\Security\PerangkatReader();
        return $perangkat->getPerangkatById('1560313600');
    }

    public function getListPerangkat()
    {
        $perangkat = new \Security\Lib\Services\Security\PerangkatReader();
        return $perangkat->getListPerangkat();
    }

    public function getAkun()
    {
        $perangkat = new \Security\Lib\Services\Security\AkunReader();
        return $perangkat->getAkunById('1560310387');
    }

    public function getListAkun()
    {
        $perangkat = new \Security\Lib\Services\Security\AkunReader();
        return $perangkat->getListAkun();
    }
    
    public function getAkunDanPerangat()
    {
        $ap =  new \Security\Lib\Services\Security\AkunDanPerangkatReader();
        return $ap->getAkunDanPerangkat('1560313600', '1560310387');
    }
    
    public function sectest()
    {
        $s= new Security\Lib\Services\Security();
        
        $perangkatAllowed = $s->isPerangkatAllowed('356938035643809');
        $akunAllowed = $s->isAkunAllowed('bot');
        $akunPerangkatAllowed = $s->isAkunDanPerangkatAllowed("356938035643809", "bot");
        
        return [
            "perangkat" => $perangkatAllowed,
            "akun" => $akunAllowed,
            "akunDanPerangkat" => $akunPerangkatAllowed
        ];
    }

}

//$test = new ReaderTest();
//$res = $test->sectest();
//var_dump($res);
$akun = new Security\Lib\Services\Security\AkunUpdater();
$data = [
    "id_akun" => "bot",
    "deskripsi_akun" => "test data",
    "delete_at" => null
];
$res = $akun->update($data);
print_r($res);
//$test = new ReaderTest();
//$result = $test->getAkunDanPerangat();
//var_dump($result);
