<?php
namespace SignInBase;


/**
 * Interface AuthenticatorInterface
 * @package SignInBase
 */
interface AuthenticatorInterface
{

    /**
     * Check user authentication
     *
     * @return bool
     */
    public function authenticated();

    /**
     * Encode password
     *
     * @param string $password
     * @param string $salt
     * @return string
     */
    public function encodePassword($password, $salt = '');

    /**
     * Get current siteuser
     *
     * @return mixed
     */
    public function getCurrentUser();

    /**
     * Sign in
     *
     * @param string $login
     * @param string $password
     * @return bool
     */
    public function signIn($login, $password);

    /**
     * Sign out
     *
     * @return bool
     */
    public function signOut();

    /**
     * Password check
     *
     * @param string $password
     * @param string $salt
     * @param string $passwordHash
     * @return bool
     */
    public function verifyPassword($password, $salt = '', $passwordHash);

}