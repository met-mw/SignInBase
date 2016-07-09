<?php
namespace SignInBase;


use Exception;
use InvalidArgumentException;

/**
 * Class AuthenticatorAbstract
 * @package SignInBase
 */
abstract class AuthenticatorAbstract implements HttpAuthenticatorInterface
{

    /** @var string Password hash salt */
    protected $salt = '';

    /**
     * Encode password
     *
     * @param string $password
     * @param string $salt
     * @return string
     * @throws Exception
     */
    public function encodePassword($password, $salt = '')
    {
        if (!is_string($password)) {
            throw new InvalidArgumentException('Password must be a string.');
        }

        if (!is_string($salt)) {
            throw new InvalidArgumentException('Salt must be a string.');
        }

        $passwordHash = password_hash($password . (empty($salt) ? $this->salt : $salt), PASSWORD_DEFAULT);
        if (is_bool($passwordHash)) {
            throw new Exception('Password encoding filed.');
        }

        return $passwordHash;
    }

    /**
     * Password check
     *
     * @param string $password
     * @param string $salt
     * @param string $passwordHash
     * @return bool
     */
    public function verifyPassword($password, $salt = '', $passwordHash)
    {
        if (!is_string($password)) {
            throw new InvalidArgumentException('Password must be a string.');
        }

        if (!is_string($salt)) {
            throw new InvalidArgumentException('Salt must be a string.');
        }

        if (!is_string($passwordHash)) {
            throw new InvalidArgumentException('Password hash must be a string.');
        }

        return password_verify($password . (empty($salt) ? $this->salt : $salt), $passwordHash);
    }

}