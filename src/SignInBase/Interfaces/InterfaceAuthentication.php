<?php
namespace SignInBase\Interfaces;


interface InterfaceAuthentication extends InterfaceHttpAuthentication
{

    /**
     * Выход
     *
     * @return bool
     */
    public function signOut();

}