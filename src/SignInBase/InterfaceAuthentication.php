<?php
namespace SignInBase;


interface InterfaceAuthentication extends InterfaceHttpAuthentication
{

    /**
     * Выход
     *
     * @return bool
     */
    public function signOut();

}