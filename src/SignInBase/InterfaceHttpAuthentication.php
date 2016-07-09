<?php
namespace SignInBase;


interface InterfaceHttpAuthentication
{

    /**
     * Шифрование пароля
     *
     * @param string $password
     * @param string $salt
     * @return string|bool В случае ошибки вернёт false, в случае успешного шифрования вернёт зашифрованный пароль
     */
    public function encodePassword($password, $salt = null);

    /**
     * Проверка пароля
     *
     * @param string $inputPassword
     * @param string $encodedReferencePassword
     * @return bool
     */
    public function verifyPassword($inputPassword, $encodedReferencePassword);

    /**
     * Проверка аутернтификации пользователя
     *
     * @return bool
     */
    public function authenticated();

    /**
     * Аутентификация
     *
     * @param string $login
     * @param string $password
     * @return bool
     */
    public function signIn($login, $password);

}