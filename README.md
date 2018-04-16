# Security
The Secure Password &amp; Keygen Generator
Inspired by [randomkeygen](https://randomkeygen.com/#)

![MIT](https://img.shields.io/badge/license-MIT-lightgrey.svg?style=flat-square)
![PHP](https://img.shields.io/badge/language-PHP%20%3E%3D%205.4-green.svg)
[![Build Status](https://travis-ci.org/rbarros/RandomKeyGen.svg?branch=master)](https://travis-ci.org/rbarros/RandomKeyGen)
[![Code Climate](https://codeclimate.com/github/rbarros/RandomKeyGen/badges/gpa.svg)](https://codeclimate.com/github/rbarros/RandomKeyGen)
[![Test Coverage](https://codeclimate.com/github/rbarros/RandomKeyGen/badges/coverage.svg)](https://codeclimate.com/github/rbarros/RandomKeyGen/coverage)

Você pode instalar com Composer (recomendado) ou manualmente.

```
$ curl -sS https://getcomposer.org/installer | php
$ php composer.phar install --prefer-source
```

## Tests

Tests
```
$ vendor/bin/phpunit --configuration phpunit.xml
```

Tests Coverage
```
$ vendor/bin/phpunit --configuration phpunit.xml.dist
```

Coverage codeclimate
```
$ vendor/bin/phpunit --coverage-clover build/logs/clover.xml
```
## Documentation
_(Coming soon)_

## Examples


### KeyGen - The Secure Password & Keygen Generator

```php
require 'vendor/autoload.php';

$key = new Security\Random\KeyGen::getKey('ci_key');
var_dump($key);
string(32) "YRT16XIkbBjqPkczWlgIRLAqzhFglIt0"
```

### OpenSSL - Public Key & Private Key

Encrypting data with the public key and decrypting data with the private key.

```
$ openssl genrsa -out private.key 1024
$ openssl rsa -in private.key -out public.pem -outform PEM -pubout
```

```php
require 'vendor/autoload.php';

$openssl = new OpenSSL();
$openssl->setPublicFile('public.pem')
        ->encrypt('Test Encrypt Data with OpenSSL');

$dataCrypt = $openssl->getDataCrypt();
$dataKey = $openssl->getKey();

var_dump($dataCrypt);
string(40) "aGMFNEuZCgpcSr6HDW9tl3JEIJc+5uJyRl/VFGiG"
var_dump($dataKey);
string(172) "rCm45TK5xvcU+sNrYmZGpYxH1HZW84K0eLKfqSzbu7+J4d24/PMJDuUXth4ulRbxfdwEt8sphAn7kG9cQZ/9UHjnDfN5Ck1foZ3q08OvsyFsuDlefrSSWpRSRKFirg8X7ZnP+M0Amh2/ngBcCapUM9dh+ILobUV2aC6wgCGsTv8="

$openssl->setPrivateFile('private.key')
        ->decrypt($dataCrypt, $dataKey);

var_dump($openssl->getDataDecrypt());
string(30) "Test Encrypt Data with OpenSSL"
```

## Release History

* **v1.0.0** - 2018-04-13
   - Initial release.

## License

The Slim.js is licensed under the MIT license. See [License File](LICENSE) for more information.
