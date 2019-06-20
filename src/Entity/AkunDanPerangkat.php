<?php
namespace Security\Entity;

use Security\Entity\Perangkat;
use Security\Entity\Akun;
/**
 * @Entity
 * @Table(name="tb_perangkat_dan_akun")
 */
class AkunDanPerangkat
{

    /**
     * @Id
     * @Column(name="id_perangkat_dan_akun", type="integer")
     * @GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @ManyToOne(targetEntity="Perangkat")
     * @JoinColumn(name="id_perangkat", referencedColumnName="id_perangkat")
     */
    private $id_perangkat;

    /**
     * @ManyToOne(targetEntity="Akun")
     * @JoinColumn(name="id_akun", referencedColumnName="id_akun")
     */
    private $id_akun;

    /**
     * @Column(type="datetime", nullable=true)
     */
    protected $delete_at;

    /**
     * @Column(type="datetime", nullable=true)
     */
    protected $create_at;

    /**
     * @Column(type="datetime", nullable=true)
     */
    protected $last_update;

    /**
     * @Column(type="string", nullable=true)
     */
    protected $create_by;
    
    function getId()
    {
        return $this->id;
    }
    
    function getDelete_at()
    {
        return $this->delete_at === null ? $this->delete_at : $this->delete_at->format('Y-m-d H:i:s');
    }

    function getCreate_at()
    {
        return $this->create_at === null ? $this->create_at : $this->create_at->format('Y-m-d H:i:s');
    }

    function getLast_update()
    {
        return $this->last_update === null ? $this->last_update : $this->last_update->format('Y-m-d H:i:s');
    }

    function getCreate_by()
    {
        return $this->create_by;
    }

    function setDelete_at($delete_at)
    {
        $this->delete_at = $delete_at;
    }

    function setCreate_at($create_at)
    {
        $this->create_at = $create_at;
    }

    function setLast_update($last_update)
    {
        $this->last_update = $last_update;
    }

    function setCreate_by($create_by)
    {
        $this->create_by = $create_by;
    }

    function getId_perangkat()
    {
        return $this->id_perangkat;
    }

    function getId_akun()
    {
        return $this->id_akun;
    }

    function setId_perangkat(Perangkat $id_perangkat)
    {
        $this->id_perangkat = $id_perangkat;
    }

    function setId_akun(Akun $id_akun)
    {
        $this->id_akun = $id_akun;
    }

}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

