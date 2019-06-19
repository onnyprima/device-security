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

    function getArrayResult()
    {
        return [
            "id_akun" => $this->getId(),
            "deskripsi_akun" => $this->getDeskripsi_akun(),
            "delete_at" => $this->getDelete_at(),// === null ? $this->getDelete_at() : $this->getDelete_at()->format("Y-m-d H:i:s"),
            "create_at" => $this->getCreate_at(),// === null ? $this->getCreate_at() : $this->getCreate_at()->format("Y-m-d H:i:s"),
            "last_update" => $this->getLast_update(),// === null ? $this->getLast_update() : $this->getLast_update()->format("Y-m-d H:i:s"),
            "create_by" => $this->getCreate_by()
        ];
    }
}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

