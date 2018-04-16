<?php
/**
 * This file is part of the Ramon Barros (http://ramon-barros.com)
 *
 * Copyright (c) 2018  Ramon Barros (http://ramon-barros.com)
 *
 * For the full copyright and license information, please view
 * the file LICENSE that was distributed with this source code.
 */
namespace Security\Random;

/**
 * Generate random keys for the system
 *
 * @package Saga
 * @subpackage Security
 * @author Ramon Barros <contato@ramon-barros.com>
 * @copyright 2018 Saga Sistemas
 * @link(RandomKeyGen, https://randomkeygen.com/#)
 */
class KeyGen
{
    const LOWERCASE = 'abcdefghijklmnopqrstuvwxyz';
    const UPPERCASE = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    const NUMBERS = '1234567890';
    const SPECIAL = '`~!@#$%^&*()-=_+[]{}|;\':",./<>?';
    const HEX = '123456789ABCDEF';

    public static $instance;

    private $types = array(
         'decent_pw'    => 'Memorable Passwords - Perfect for securing your computer or mobile device, or somewhere brute force is detectable.'
        ,'strong_pw'    => 'Strong Passwords - Robust enough to keep your web hosting account secure.'
        ,'ft_knox_pw'   => 'Fort Knox Passwords - Secure enough for almost anything, like root or administrator passwords.'
        ,'ci_key'       => 'CodeIgniter Encryption Keys - Can be used for any other 256-bit key requirement.'
        ,'160_wpa'      => '160-bit WPA Key'
        ,'504_wpa'      => '504-bit WPA Key'
        ,'64_wep'       => '64-bit WEP Keys'
        ,'128_wep'      => '128-bit WEP Keys'
        ,'152_wep'      => '152-bit WEP Keys'
        ,'256_wep'      => '256-bit WEP Keys'
    );

    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            $object = __CLASS__;
            self::$instance = new $object;
        }
        return self::$instance;
    }

    private function keyGen(
        $length = 0,
        $useLowerCase = true,
        $useUpperCase = true,
        $useNumbers = true,
        $useSpecial = true,
        $useHex = false
    ) {
        $chars = '';
        $key = '';

        if ($useLowerCase) {
            $chars .= KeyGen::LOWERCASE;
        }
        if ($useUpperCase) {
            $chars .= KeyGen::UPPERCASE;
        }
        if ($useNumbers) {
            $chars .= KeyGen::NUMBERS;
        }
        if ($useSpecial) {
            $chars .= KeyGen::SPECIAL;
        }
        if ($useHex) {
            $chars .= KeyGen::HEX;
        }

        for ($i = 0; $i < $length; $i++) {
            $strlen = strlen($chars);
            $rand = $this->random() * $strlen;
            $floor = floor($rand);
            $position = (int)$floor;
            $key .= $chars{$position};
        }

        return $key;
    }

    private function random()
    {
        return (float)rand()/(float)getrandmax();
    }

    public static function getType($strength = null)
    {
        $self = self::getInstance();
        return !empty($self->types[$strength]) ? $self->types[$strength] : null;
    }

    public static function getKey($strength = null)
    {
        $self = self::getInstance();
        switch ($strength) {
            case 'decent_pw':
                $hash = $self->keyGen(10, true, true, true, false, false);
                break;
            case 'strong_pw':
                $hash = $self->keyGen(15, true, true, true, true, false);
                break;
            case 'ft_knox_pw':
                $hash = $self->keyGen(30, true, true, true, true, false);
                break;
            case 'ci_key':
                $hash = $self->keyGen(32, true, true, true, false, false);
                break;
            case '160_wpa':
                $hash = $self->keyGen(20, true, true, true, true, false);
                break;
            case '504_wpa':
                $hash = $self->keyGen(63, true, true, true, true, false);
                break;
            case '64_wep':
                $hash = $self->keyGen(5, false, false, false, false, true);
                break;
            case '128_wep':
                $hash = $self->keyGen(13, false, false, false, false, true);
                break;
            case '152_wep':
                $hash = $self->keyGen(16, false, false, false, false, true);
                break;
            case '256_wep':
                $hash = $self->keyGen(29, false, false, false, false, true);
                break;
            default:
                $hash = "No such strength ${strength}";
                break;
        }
        return $hash;
    }
}
