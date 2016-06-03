<?php
namespace SignInInterfaces\Classes;

use SignInInterfaces\Interfaces\InterfaceAuthentication;

abstract class Authentication implements InterfaceAuthentication
{

    const SESSION_KEY_NAME = 'current_user';

    protected function setSessionKey($sessionKey)
    {
        session_start();
        $_SESSION[self::SESSION_KEY_NAME] = $sessionKey;
    }

    protected function getSessionKey()
    {
        session_start();
        return $this->authenticated() ? $_SESSION[self::SESSION_KEY_NAME] : null;
    }

    public function authenticated()
    {
        session_start();
        return isset($_SESSION[self::SESSION_KEY_NAME]) && $_SESSION[self::SESSION_KEY_NAME];
    }

    public function signOut()
    {
        session_start();
        unset($_SESSION[self::SESSION_KEY_NAME]);
    }

    public function encodePassword($password, $salt = null)
    {
        return password_hash($password, PASSWORD_DEFAULT, $salt === null ? null : ['salt' => $salt]);
    }

    public function verifyPassword($inputPassword, $encodedReferencePassword)
    {
        return password_verify($inputPassword, $encodedReferencePassword);
    }

}