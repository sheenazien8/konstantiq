# The missing constant class in laravel

[![Latest Version on Packagist](https://img.shields.io/packagist/v/sheenazien8/konstantiq.svg?style=flat-square)](https://packagist.org/packages/sheenazien8/konstantiq)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/sheenazien8/konstantiq/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/sheenazien8/konstantiq/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/sheenazien8/konstantiq/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/sheenazien8/konstantiq/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/sheenazien8/konstantiq.svg?style=flat-square)](https://packagist.org/packages/sheenazien8/konstantiq)

This is a simple package that helps you manage your constant values. The root cause of this library is that sometimes you need the status in the view or the API response, but you have more than one status. You can look at the example below.

```php
<?php

class SomeClass 
{
    // This method returns an array of status strings
    public function pain(): array
    {
        return [
            'Pending',
            'Failed',
            'Done'
        ];
    }

    // This method returns an array of status constants from PaymentStatus
    public function healthy(): array
    {
        return PaymentStatus::all()->toArray();
    }
}
```

## Installation

You can install the package via composer:

```bash
composer require sheenazien8/konstantiq
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="konstantiq-config"
```

## Usage
```bash
php artisan make:constant PaymentStatus #it will generate class \App\Constants\PaymentStatus
```

```php
<?php

namespace App\Constants;

use Sheenazien8\Konstantiq\ConstanstAbstraction;

class PaymentStatus extends ConstanstAbstraction
{
    // You can add the constants that you need
    const PENDING = 'pending';
    const DONE = 'done';
}

// Usage example
PaymentStatus::PENDING; // will return the 'pending' value
PaymentStatus::all(); // will return the all of the constants
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [sheenazien8](https://github.com/sheenazien8)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
