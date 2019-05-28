<?php

namespace Security\Lib\Services\Mysql;

class MysqlQuery
{

    static function insertPerangkatQuery()
    {
        $sql = "INSERT INTO tb_perangkat ("
                . "NOMOR, "
                . "DESKRIPSI_PERANGKAT, "
                . "DELETE_AT, "
                . "CREATE_AT, "
                . "LAST_UPDATE, "
                . "CREATE_BY) "
                . "VALUES ("
                . ":NOMOR, "
                . ":DESKRIPSI_PERANGKAT, "
                . ":DELETE_AT, "
                . ":CREATE_AT, "
                . ":LAST_UPDATE, "
                . ":CREATE_BY)";
        return $sql;
    }

    static function insertAkunQuery()
    {
        $sql = "INSERT INTO tb_akun_aplikasi ("
                . "ID_AKUN,"
                . "AKUN_DESKRIPSI,"
                . "AKUN_DELETE_AT,"
                . "AKUN_CREATE_AT,"
                . "AKUN_LAST_UPDATE,"
                . "AKUN_CREATE_BY) "
                . "VALUES ("
                . ":ID_AKUN,"
                . ":AKUN_DESKRIPSI,"
                . ":AKUN_DELETE_AT,"
                . ":AKUN_CREATE_AT,"
                . ":AKUN_LAST_UPDATE,"
                . ":AKUN_CREATE_BY)";
        return $sql;
    }
    
    static function insertPerangkatDanAkun()
    {
        $sql = "INSERT INTO tb_perangkat_dan_akun ("
                . "NOMOR,"
                . "ID_AKUN) "
                . "VALUES ("
                . ":NOMOR,"
                . ":ID_AKUN) ";
        return $sql;
    }
}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

