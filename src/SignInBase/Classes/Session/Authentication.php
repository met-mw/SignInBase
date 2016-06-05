<?php
namespace SignInBase\Classes\Session;


use SignInBase\Classes\AbstractAuthenticate;
use SignInBase\Interfaces\InterfaceAuthentication;

abstract class Authentication extends AbstractAuthenticate implements InterfaceAuthentication
{

    /** Имя ключа в сессии */
    protected $sessionKeyName = 'sib_current_user';

    protected function setSessionKey($sessionKey)
    {
        session_start();
        $_SESSION[$this->sessionKeyName] = $sessionKey;
    }

    protected function getSessionKey()
    {
        return $this->hasSessionKey() ? $_SESSION[$this->sessionKeyName] : null;
    }

    protected function hasSessionKey()
    {
        session_start();
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
        session_start();
        unset($_SESSION[$this->sessionKeyName]);
    }

}