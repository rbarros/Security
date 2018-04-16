<?php

use Security\Random\KeyGen;

/**
 * Teste da Classe KeyGen
 */
class SecurityRandomKeyGenTest extends AbstractTest
{
    public static function setUpBeforeClass()
    {
    }

    public static function tearDownAfterClass()
    {
    }

    public function assertPreConditions()
    {
        $this->assertTrue(
            class_exists($class = 'Security\\Random\\KeyGen'),
            'Class not found: '.$class
        );
    }

    public function testInicial()
    {
        $this->assertTrue(true);
    }

    public function testNoSuch()
    {
        $key = KeyGen::getKey('md5');
        $this->assertTrue(!empty($key));
        $this->assertEquals($key, 'No such strength md5');
        $text = KeyGen::getType('md5');
        $this->assertEquals(
            $text,
            null
        );
    }

    public function testDecentPw()
    {
        $key = KeyGen::getKey('decent_pw');
        $this->assertTrue(!empty($key));
        $this->assertEquals(strlen($key), 10);
        $text = KeyGen::getType('decent_pw');
        $this->assertEquals(
            $text,
            'Memorable Passwords - Perfect for securing your computer or mobile device, or somewhere brute force is detectable.'
        );
    }

    public function testStrongPw()
    {
        $key = KeyGen::getKey('strong_pw');
        $this->assertTrue(!empty($key));
        $this->assertEquals(strlen($key), 15);
        $text = KeyGen::getType('strong_pw');
        $this->assertEquals(
            $text,
            'Strong Passwords - Robust enough to keep your web hosting account secure.'
        );
    }

    public function testFtKnoxPw()
    {
        $key = KeyGen::getKey('ft_knox_pw');
        $this->assertTrue(!empty($key));
        $this->assertEquals(strlen($key), 30);
        $text = KeyGen::getType('ft_knox_pw');
        $this->assertEquals(
            $text,
            'Fort Knox Passwords - Secure enough for almost anything, like root or administrator passwords.'
        );
    }

    public function testCiKey()
    {
        $key = KeyGen::getKey('ci_key');
        $this->assertTrue(!empty($key));
        $this->assertEquals(strlen($key), 32);
        $text = KeyGen::getType('ci_key');
        $this->assertEquals(
            $text,
            'CodeIgniter Encryption Keys - Can be used for any other 256-bit key requirement.'
        );
    }

    public function test160Wpa()
    {
        $key = KeyGen::getKey('160_wpa');
        $this->assertTrue(!empty($key));
        $this->assertEquals(strlen($key), 20);
        $text = KeyGen::getType('160_wpa');
        $this->assertEquals(
            $text,
            '160-bit WPA Key'
        );
    }

    public function test504Wpa()
    {
        $key = KeyGen::getKey('504_wpa');
        $this->assertTrue(!empty($key));
        $this->assertEquals(strlen($key), 63);
        $text = KeyGen::getType('504_wpa');
        $this->assertEquals(
            $text,
            '504-bit WPA Key'
        );
    }

    public function test64Wep()
    {
        $key = KeyGen::getKey('64_wep');
        $this->assertTrue(!empty($key));
        $this->assertEquals(strlen($key), 5);
        $text = KeyGen::getType('64_wep');
        $this->assertEquals(
            $text,
            '64-bit WEP Keys'
        );
    }

    public function test128Wep()
    {
        $key = KeyGen::getKey('128_wep');
        $this->assertTrue(!empty($key));
        $this->assertEquals(strlen($key), 13);
        $text = KeyGen::getType('128_wep');
        $this->assertEquals(
            $text,
            '128-bit WEP Keys'
        );
    }

    public function test152Wep()
    {
        $key = KeyGen::getKey('152_wep');
        $this->assertTrue(!empty($key));
        $this->assertEquals(strlen($key), 16);
        $text = KeyGen::getType('152_wep');
        $this->assertEquals(
            $text,
            '152-bit WEP Keys'
        );
    }

    public function test256Wep()
    {
        $key = KeyGen::getKey('256_wep');
        $this->assertTrue(!empty($key));
        $this->assertEquals(strlen($key), 29);
        $text = KeyGen::getType('256_wep');
        $this->assertEquals(
            $text,
            '256-bit WEP Keys'
        );
    }
}
