<?php

namespace Security\Lib\Services\Mysql;

class MysqlQuery
{

    static function insertQuery()
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

}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

