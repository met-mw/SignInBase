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
        session_start();
        return $this->authenticated() ? $_SESSION[$this->sessionKeyName] : null;
    }

    /**
     * Проверка аутернтификации пользователя
     *
     * @return bool
     */
    public function authenticated()
    {
        session_start();
        return isset($_SESSION[$this->sessionKeyName]) && $_SESSION[$this->sessionKeyName];
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