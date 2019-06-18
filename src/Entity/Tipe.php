<?php

namespace Security\Entity;

/**
 * @Entity 
 * @Table(name="tb_tipe")
 */
class Tipe
{

    /**
     * @Id
     * @Column(name="id_tipe", type="integer")
     * @GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     *
     * @Column(name="nama", type="string")
     */
    protected $nama;

    function getId()
    {
        return $this->id;
    }

    function getNama()
    {
        return $this->nama;
    }

    function setNama($nama)
    {
        $this->nama = $nama;
    }

}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

