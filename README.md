# Stringer

[![Build Status](https://travis-ci.org/stahiralijan/stringer.svg?branch=master)](https://travis-ci.org/stahiralijan/stringer)
[![styleci](https://styleci.io/repos/CHANGEME/shield)](https://styleci.io/repos/CHANGEME)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/stahiralijan/stringer/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/stahiralijan/stringer/?branch=master)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/CHANGEME/mini.png)](https://insight.sensiolabs.com/projects/CHANGEME)
[![Coverage Status](https://coveralls.io/repos/github/stahiralijan/stringer/badge.svg?branch=master)](https://coveralls.io/github/stahiralijan/stringer?branch=master)

[![Packagist](https://img.shields.io/packagist/v/stahiralijan/stringer.svg)](https://packagist.org/packages/stahiralijan/stringer)
[![Packagist](https://poser.pugx.org/stahiralijan/stringer/d/total.svg)](https://packagist.org/packages/stahiralijan/stringer)
[![Packagist](https://img.shields.io/packagist/l/stahiralijan/stringer.svg)](https://packagist.org/packages/stahiralijan/stringer)

Package description: CHANGE ME

## Installation

Install via composer
```bash
composer require stahiralijan/stringer
```

### Register Service Provider

**Note! This and next step are optional if you use laravel>=5.5 with package
auto discovery feature.**

Add service provider to `config/app.php` in `providers` section
```php
Stahiralijan\Stringer\ServiceProvider::class,
```

### Register Facade

Register package facade in `config/app.php` in `aliases` section
```php
Stahiralijan\Stringer\Facades\Stringer::class,
```

### Publish Configuration File

```bash
php artisan vendor:publish --provider="Stahiralijan\Stringer\ServiceProvider" --tag="config"
```

## Usage

Following methods are provided:

- `has($needle, $insensitive = FALSE)`
- `toUpper()`
- `toLower()`
- `toTitle()`
- `substrUpper($start = 0, $length = 1)`
- `substrLower($start = 0, $length = 1)`
- `capitalize()`
- `titleCase()`
- `toCharArray($length = 1)`
- `toWordsArray()`
- `substring($start = 0, $length = NULL)`
- `before($search, $includeWord = FALSE)`
- `after($search, $includeWord = FALSE)`
- `between($start, $end, $includeWords = FALSE)`
- `startsWith($search)`
- `endsWith($search)`
- `reverse()`
- `reverseCase()`
- `toSlug($delimiter = '-')`
- `simplify()`
- `replaceAll($search, string $replacement)`
- `replaceFirst($search, $replacement)`
- `replaceLast($search, $replacement)`
- `replaceN($search, $replacement, $numbers)`
- `indexOf($search, $insensitive = FALSE)`
- `lastIndexOf($search, $insensitive = FALSE)`
- `countWords()`
- `contains($search)`
- `equals($value)`
- `insertAt($value, $position)`
- `leftTrim()`
- `rightTrim()`
- `trim()`
- `length()`
- `printf($format)`
- `limit($limit = 100, $terminator = '...', $includeTerminator = FALSE)`

## Security

If you discover any security related issues, please email.

## Credits

- [](https://github.com/stahiralijan/stringer)
- [All contributors](https://github.com/stahiralijan/stringer/graphs/contributors)

This package is bootstrapped with the help of
[melihovv/laravel-package-generator](https://github.com/melihovv/laravel-package-generator).
