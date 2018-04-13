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

    public function testDecentPw()
    {
        $key = KeyGen::getKey('decent_pw');
        $this->assertTrue(!empty($key));
        $this->assertEquals(strlen($key), 10);
    }

    public function testStrongPw()
    {
        $key = KeyGen::getKey('strong_pw');
        $this->assertTrue(!empty($key));
        $this->assertEquals(strlen($key), 15);
    }

    public function testFtKnoxPw()
    {
        $key = KeyGen::getKey('ft_knox_pw');
        $this->assertTrue(!empty($key));
        $this->assertEquals(strlen($key), 30);
    }

    public function testCiKey()
    {
        $key = KeyGen::getKey('ci_key');
        $this->assertTrue(!empty($key));
        $this->assertEquals(strlen($key), 32);
    }

    public function test160Wpa()
    {
        $key = KeyGen::getKey('160_wpa');
        $this->assertTrue(!empty($key));
        $this->assertEquals(strlen($key), 20);
    }

    public function test504Wpa()
    {
        $key = KeyGen::getKey('504_wpa');
        $this->assertTrue(!empty($key));
        $this->assertEquals(strlen($key), 63);
    }

    public function test64Wep()
    {
        $key = KeyGen::getKey('64_wep');
        $this->assertTrue(!empty($key));
        $this->assertEquals(strlen($key), 5);
    }

    public function test128Wep()
    {
        $key = KeyGen::getKey('128_wep');
        $this->assertTrue(!empty($key));
        $this->assertEquals(strlen($key), 13);
    }

    public function test152Wep()
    {
        $key = KeyGen::getKey('152_wep');
        $this->assertTrue(!empty($key));
        $this->assertEquals(strlen($key), 16);
    }

    public function test256Wep()
    {
        $key = KeyGen::getKey('256_wep');
        $this->assertTrue(!empty($key));
        $this->assertEquals(strlen($key), 29);
    }
}
