<?php
namespace SignInBase\Classes;


use SignInBase\Interfaces\InterfaceHttpAuthentication;

abstract class AbstractAuthenticate implements InterfaceHttpAuthentication
{

    /**
     * Шифрование пароля
     *
     * @param string $password
     * @param string $salt
     * @return string|bool В случае ошибки вернёт false, в случае успешного шифрования вернёт зашифрованный пароль
     */
    public function encodePassword($password, $salt = null)
    {
        return password_hash($password . ($salt === null ? '' : $salt), PASSWORD_DEFAULT);
    }

    /**
     * Проверка пароля
     *
     * @param string $inputPassword
     * @param string $encodedReferencePassword
     * @return bool
     */
    public function verifyPassword($inputPassword, $encodedReferencePassword)
    {
        return password_verify($inputPassword, $encodedReferencePassword);
    }

}