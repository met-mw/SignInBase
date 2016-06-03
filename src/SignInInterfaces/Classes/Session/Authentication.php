<?php
namespace SignInBase\Classes\Session;


use SignInBase\Classes\AbstractAuthenticate;
use SignInBase\Interfaces\InterfaceAuthentication;

abstract class Authentication extends AbstractAuthenticate implements InterfaceAuthentication
{

    /** Имя ключа в сессии */
    const SESSION_KEY_NAME = 'sib_current_user';

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

    /**
     * Проверка аутернтификации пользователя
     *
     * @return bool
     */
    public function authenticated()
    {
        session_start();
        return isset($_SESSION[self::SESSION_KEY_NAME]) && $_SESSION[self::SESSION_KEY_NAME];
    }

    /**
     * Выход
     *
     * @return bool
     */
    public function signOut()
    {
        session_start();
        unset($_SESSION[self::SESSION_KEY_NAME]);
    }

}