<?php
namespace SignInBase\Session;


use SignInBase\AuthenticatorInterface;

/**
 * Class AuthenticatorAbstract
 * @package SignInBase\Session
 */
abstract class AuthenticatorAbstract extends \SignInBase\AuthenticatorAbstract implements AuthenticatorInterface
{

    /** @var string Session key name */
    protected $sessionKeyName = 'sib_current_user';

    public function __construct()
    {
        session_start();
    }

    /**
     * Set session key value
     *
     * @param string $value
     */
    protected function setSessionKey($value)
    {
        $_SESSION[$this->sessionKeyName] = $value;
    }

    /**
     * Get session key value
     *
     * @return mixed|null
     */
    protected function getSessionKey()
    {
        return $this->hasSessionKey() ? $_SESSION[$this->sessionKeyName] : null;
    }

    /**
     * Check session key value exists
     *
     * @return bool
     */
    protected function hasSessionKey()
    {
        return isset($_SESSION[$this->sessionKeyName]) && $_SESSION[$this->sessionKeyName];
    }

    /**
     * Check user authentication
     *
     * @return bool
     */
    public function authenticated()
    {
        return $this->hasSessionKey();
    }

    /**
     * Sign out
     *
     * @return bool
     */
    public function signOut()
    {
        unset($_SESSION[$this->sessionKeyName]);
    }

}