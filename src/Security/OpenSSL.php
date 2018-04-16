<?php
/**
 * This file is part of the Ramon Barros (http://ramon-barros.com)
 *
 * Copyright (c) 2018  Ramon Barros (http://ramon-barros.com)
 *
 * For the full copyright and license information, please view
 * the file LICENSE that was distributed with this source code.
 */
namespace Security;

/**
 * Encrypt and Decrypt Messages Using OpenSSL
 *
 * @package Saga
 * @subpackage Security
 * @author Ramon Barros <contato@ramon-barros.com>
 * @copyright 2018 Saga Sistemas
 * @link(openssl, http://php.net/manual/pt_BR/function.openssl-get-privatekey.php)
 */
class OpenSSL
{
    /**
     * Mensagem
     * @var string
     */
    private $message;

    /**
     * Chaves publicas
     *
     * @var array
     */
    private $publicKeys = [];

    /**
     * Chaves privada
     *
     * @var string
     */
    private $privateKey;

    /**
     * Resultado da encriptação/descriptação
     *
     * @var boolean
     */
    private $result;

    /**
     * String encriptada da mensagem
     *
     * @var string
     */
    private $encryptedData;

    /**
     * Matriz de chaves encriptadas
     *
     * @var array
     */
    private $encryptedKeys;

    /**
     * Dados descriptografado
     *
     * @var string
     */
    private $decryptedData;

    // Load the public key into an array
    public function setPublicFile($file = null)
    {
        if (file_exists($file)) {
            $pem = @file_get_contents($file);
            if (!empty($pem)) {
                $this->publicKeys[] = openssl_get_publickey(
                    $pem
                );
            }
        }
        return $this;
    }

    // Load the public key into an array
    public function setPrivateFile($file = null)
    {
        if (file_exists($file)) {
            $key = @file_get_contents($file);
            if (!empty($key)) {
                $this->privateKey = openssl_get_privatekey(
                    $key
                );
            }
        }
        return $this;
    }

    // Encrypt the $message and return the $encryptedData and the $encryptedKeys
    public function encrypt($message = null)
    {
        $this->message = $message;
        $this->result = openssl_seal(
            $this->message,
            $this->encryptedData,
            $this->encryptedKeys,
            $this->publicKeys
        );
        return $this;
    }

    public function getDataCrypt()
    {
        return base64_encode($this->encryptedData);
    }

    public function getKey($key = 0)
    {
        return base64_encode($this->encryptedKeys[$key]);
    }

    // Decrypt the data with our $privateKey and store the result in $decryptedData
    public function decrypt($encryptedData = null, $encryptedKey = null)
    {
        $this->result = openssl_open(
            base64_decode($encryptedData),
            $this->decryptedData,
            base64_decode($encryptedKey),
            $this->privateKey
        );

        return $this;
    }

    public function getDataDecrypt()
    {
        return $this->decryptedData;
    }
}
