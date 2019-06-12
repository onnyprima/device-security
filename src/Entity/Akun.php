<?php
namespace Security\Entity;
/**
 * @Entity
 * @Table(name="tb_akun")
 */
class Akun
{

    /**
     * @Id
     * @Column(name="id_akun", type="string", length=50)
     */
    protected $id;

    /**
     * @Column(type="string", nullable=true)
     */
    protected $deskripsi_akun;

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

    function getDeskripsi_akun()
    {
        return $this->deskripsi_akun;
    }

    function getDelete_at()
    {
        return $this->delete_at;
    }

    function getCreate_at()
    {
        return $this->create_at;
    }

    function getLast_update()
    {
        return $this->last_update;
    }

    function getCreate_by()
    {
        return $this->create_by;
    }

    function setId($id)
    {
        $this->id = $id;
    }

    function setDeskripsi_akun($deskripsi_akun)
    {
        $this->deskripsi_akun = $deskripsi_akun;
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

