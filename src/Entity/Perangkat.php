<?php

namespace Security\Entity;

/**
 * @Entity 
 * @Table(name="tb_perangkat")
 */
class Perangkat
{

    /**
     * @Id
     * @Column(name="id_perangkat", type="string", length=50)
     */
    protected $id;

    /**
     * @ManyToOne(targetEntity="Tipe")
     * @JoinColumn(name="tipe_perangkat", referencedColumnName="id")
     */
    protected $tipe_perangkat;

    /**
     * @Column(type="text", nullable=true)
     */
    protected $deskripsi_perangkat;
    
    /**
     * @Column(type="text", nullable=true)
     */
    protected $deskripsi_lokasi_perangkat;

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

    function getDeskripsi_perangkat()
    {
        return $this->deskripsi_perangkat;
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

    function setId($id)
    {
        $this->id = $id;
    }

    function setDeskripsi_perangkat($deskripsi_perangkat)
    {
        $this->deskripsi_perangkat = $deskripsi_perangkat;
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

}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

