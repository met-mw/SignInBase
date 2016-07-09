<?php
namespace SignInBase\Session;


use SignInBase\AbstractAuthenticate;
use SignInBase\InterfaceAuthentication;

abstract class Authentication extends AbstractAuthenticate implements InterfaceAuthentication
{

    /** Имя ключа в сессии */
    protected $sessionKeyName = 'sib_current_user';

    public function __construct()
    {
        session_start();
    }

    protected function setSessionKey($sessionKey)
    {

        $_SESSION[$this->sessionKeyName] = $sessionKey;
    }

    protected function getSessionKey()
    {
        return $this->hasSessionKey() ? $_SESSION[$this->sessionKeyName] : null;
    }

    protected function hasSessionKey()
    {
        return isset($_SESSION[$this->sessionKeyName]) && $_SESSION[$this->sessionKeyName];
    }

    /**
     * Проверка аутернтификации пользователя
     *
     * @return bool
     */
    public function authenticated()
    {
        return $this->hasSessionKey();
    }

    /**
     * Выход
     *
     * @return bool
     */
    public function signOut()
    {
        unset($_SESSION[$this->sessionKeyName]);
    }

}