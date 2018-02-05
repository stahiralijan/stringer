# Stringer

[![Packagist](https://img.shields.io/packagist/v/stahiralijan/stringer.svg)](https://packagist.org/packages/stahiralijan/stringer)
[![Packagist](https://poser.pugx.org/stahiralijan/stringer/d/total.svg)](https://packagist.org/packages/stahiralijan/stringer)
[![Packagist](https://img.shields.io/packagist/l/stahiralijan/stringer.svg)](https://packagist.org/packages/stahiralijan/stringer)

Package description: This is a string manipulation library for not only Laravel but other php projects as well.

## Dependencies
- PHP7+
- PHP mbstring (Multi-byte string) extension

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
- [All contributors](https://github.com/stahiralijan/stringer/graphs/contributors)

This package is bootstrapped with the help of
[melihovv/laravel-package-generator](https://github.com/melihovv/laravel-package-generator).