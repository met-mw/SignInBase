<?php
namespace SignInBase;


/**
 * Interface AuthorizatorInterface
 * @package SignInBase
 */
interface AuthorizatorInterface
{

    /**
     * Check user authorization
     * (rights for access into current area)
     *
     * @return bool
     */
    public function authorized();

}