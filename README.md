# RandomKeyGen
The Secure Password &amp; Keygen Generator
Inspired by [randomkeygen](https://randomkeygen.com/#)

![MIT](https://img.shields.io/badge/license-MIT-lightgrey.svg?style=flat-square)
![PHP](https://img.shields.io/badge/language-PHP%20%3E%3D%207.0-green.svg)
[![Build Status](https://travis-ci.org/rbarros/RandomKeyGen.svg?branch=master)](https://travis-ci.org/rbarros/RandomKeyGen)
[![Code Climate](https://codeclimate.com/github/rbarros/RandomKeyGen/badges/gpa.svg)](https://codeclimate.com/github/rbarros/RandomKeyGen)
[![Test Coverage](https://codeclimate.com/github/rbarros/RandomKeyGen/badges/coverage.svg)](https://codeclimate.com/github/rbarros/RandomKeyGen/coverage)

Você pode instalar com Composer (recomendado) ou manualmente.

```
$ curl -sS https://getcomposer.org/installer | php
$ php composer.phar install --prefer-source
```
#Tests

Tests sem Coverage
```
$ vendor/bin/phpunit --configuration phpunit.xml
```

Tests com coverage
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
```php
require 'vendor/autoload.php';

$key = new RandomKeyGen::getKey('ci_key');
var_dump($key);
string(32) "YRT16XIkbBjqPkczWlgIRLAqzhFglIt0"
```

## Release History

* **v1.0.0** - 2018-04-13
   - Initial release.

## License

The Slim.js is licensed under the MIT license. See [License File](LICENSE) for more information.
