<?php
namespace SignInBase;


/**
 * Interface AuthenticatorInterface
 * @package SignInBase
 */
interface AuthenticatorInterface extends HttpAuthenticatorInterface
{

    /**
     * Sign out
     *
     * @return bool
     */
    public function signOut();

    /**
     * Get current siteuser
     *
     * @return mixed
     */
    public function getCurrentUser();

    /**
     * Check user authentication
     *
     * @return bool
     */
    public function authenticated();

}