<?php

namespace Security\Entity;

/**
 * @Entity
 * @Table(name="session")
 */
class Session
{

    /**
     * @Id
     * @Column(name="token", type="string", nullable=false)
     */
    protected $id;

    /**
     * @ManyToOne(targetEntity="AkunDanPerangkat")
     * @JoinColumn(name="id_perangkat_dan_akun", referencedColumnName="id_perangkat_dan_akun")
     */
    protected $idPerangkatDanAkun;

    /**
     * @Column(type="datetime", nullable=true)
     */
    protected $expired;

    /**
     * @Column(type="datetime", nullable=true)
     */
    protected $login_at;

    /**
     * @Column(type="datetime", nullable=true)
     */
    protected $logout_at;

    function getLogin_at()
    {
        return $this->login_at;
    }

    function setLogin_at($login_at)
    {
        $this->login_at = $login_at;
    }

    function getId()
    {
        return $this->id;
    }

    function getIdPerangkatDanAkun()
    {
        return $this->idPerangkatDanAkun;
    }

    function getExpired()
    {
        return $this->expired;
    }

    function getLogout_at()
    {
        return $this->logout_at;
    }

    function setId($id)
    {
        $this->id = $id;
    }

    function setIdPerangkatDanAkun($idPerangkatDanAkun)
    {
        $this->idPerangkatDanAkun = $idPerangkatDanAkun;
    }

    function setExpired($expired)
    {
        $this->expired = $expired;
    }

    function setLogout_at($logout_at)
    {
        $this->logout_at = $logout_at;
    }

}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

