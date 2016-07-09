<?php
namespace SignInBase;


/**
 * Interface HttpAuthenticatorInterface
 * @package SignInBase
 */
interface HttpAuthenticatorInterface extends AuthenticatorInterface
{

    /**
     * Encode password
     *
     * @param string $password
     * @param string $salt
     * @return string
     */
    public function encodePassword($password, $salt = '');

    /**
     * Password check
     *
     * @param string $password
     * @param string $salt
     * @param string $passwordHash
     * @return bool
     */
    public function verifyPassword($password, $salt = '', $passwordHash);

    /**
     * Аутентификация
     *
     * @param string $login
     * @param string $password
     * @return bool
     */
    public function signIn($login, $password);

}