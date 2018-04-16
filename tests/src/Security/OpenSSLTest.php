<?php

use Security\OpenSSL;

/**
 * Teste da Classe KeyGen
 */
class SecurityOpenSSLTest extends AbstractTest
{
    private $dataCrypt;

    public static function setUpBeforeClass()
    {
    }

    public static function tearDownAfterClass()
    {
    }

    public function assertPreConditions()
    {
        $this->openssl = new OpenSSL();
        $this->assertTrue(
            class_exists($class = 'Security\\OpenSSL'),
            'Class not found: '.$class
        );
    }

    public function testInicial()
    {
        $this->assertTrue(true);
    }

    public function testEncrypt()
    {
        $this->openssl->setPublicFile(__DIR__.'/../../public.pem')
                      ->encrypt('Test Encrypt Data with OpenSSL');
        $dataCrypt = $this->openssl->getDataCrypt();
        $dataKey = $this->openssl->getKey();

        // Setup a couple filenames to store the text and its key
        $this->assertTrue(!empty($dataCrypt));
        $this->assertEquals(strlen($dataCrypt), 40);
        $this->assertTrue(!empty($dataKey));
        $this->assertEquals(strlen($dataKey), 172);

        // Write the order files
        file_put_contents(__DIR__.'/../../data.txt', $dataCrypt);
        file_put_contents(__DIR__.'/../../data.key', $dataKey);
    }

    public function testDecrypt()
    {
        // Write the order files
        $dataCrypt = file_get_contents(__DIR__.'/../../data.txt');
        $dataKey = file_get_contents(__DIR__.'/../../data.key');

        $this->openssl->setPrivateFile(__DIR__.'/../../private.key')
                      ->decrypt($dataCrypt, $dataKey);

        $data = $this->openssl->getDataDecrypt();
        $this->assertTrue(!empty($data));
        $this->assertEquals('Test Encrypt Data with OpenSSL', $data);
    }
}
