# Stringer {#readme}

[![Packagist](https://img.shields.io/packagist/v/stahiralijan/stringer.svg)](https://packagist.org/packages/stahiralijan/stringer)
[![Packagist](https://poser.pugx.org/stahiralijan/stringer/d/total.svg)](https://packagist.org/packages/stahiralijan/stringer)
[![Packagist](https://img.shields.io/packagist/l/stahiralijan/stringer.svg)](https://packagist.org/packages/stahiralijan/stringer)

This is a string manipulation library gives you convenience of string operations.

## Dependencies
- PHP8+
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

---

# Available Methods

Following methods are provided:

| Method                                                                 | Returns        | Description                                                                                   |
|------------------------------------------------------------------------|----------------|-----------------------------------------------------------------------------------------------|
| `left($length)`                                                        | **string**     | Returns a string containing a specified number of characters from the left side of a string.  |
| `right($length)`                                                       | **string**     | Returns a string containing a specified number of characters from the right side of a string. | 
| `has($needle, $case_insensitive = FALSE)`                              | **bool**       | Tests if string has sub-string.                                                               |
| `toUpper()`                                                            | **string**     | Returns the upper-case version of the string.                                                 | 
| `toLower()`                                                            | **string**     | Returns the lower-case version of the string.                                                 |
| `toTitle()`                                                            | **string**     | Returns the lower-case version of the string.                                                 |
| `substrUpper($start = 0, $length = 1)`                                 | **string**     | Returns the upper-case version of the sub-string.                                             |
| `substrLower($start = 0, $length = 1)`                                 | **string**     | Returns the lower-case version of the sub-string.                                             |
| `capitalize()`                                                         | **string**     | Returns a capitalized version of the string.                                                  |
| `titleCase()`                                                          | **string**     | Returns a title-case version of the string.                                                   |
| `toCharArray($length = 1)`                                             | **array**      | Returns array of characters of the string.                                                    |
| `toWordsArray()`                                                       | **array**      | Returns array of words of the string.                                                         |
| `substring($start = 0, $length = NULL)`                                | **string**     | Returns the sub-string of the string.                                                         |
| `before($search, $includeWord = FALSE)`                                | **string**     | Returns string before the supplied word.                                                      |	
| `after($search, $includeWord = FALSE)`                                 | **string**     | Returns string after the supplied word                                                        | 
| `between($start, $end, $includeWords = FALSE)`                         | **string**     | Returns string specified betweet `$start` and `$end`                                          |	
| `startsWith($search)`                                                  | **bool**       | Tests if the string starts with the supplied string.                                          |
| `endsWith($search)`                                                    | **string**     | Tests if the string ends with the supplied string.                                            |
| `reverse()`                                                            | **string**     | Returns a reversed version of the string.                                                     |
| `function reverseCase()`                                               | **string**     | Returns a reversed-case of the string.                                                        |
| `reverseOrder()`                                                       | **string**     | Reverses the order of the string.                                                             |
| `toSlug($delimiter = '-')`                                             | **string**     | Returns a slugged version of the string.                                                      |
| `simplify()`                                                           | **string**     | Removes the special characters from the string.                                               |
| `replaceAll($search, $replacement)`                                    | **string**     | Returns a string after replacing all occurrences of the supplied string.                      |
| `replaceFirst($search, $replacement)`                                  | **string**     | Returns a string after replacing the first occurrence of the supplied string.                 |
| `replaceLast($search, $replacement)`                                   | **string**     | Returns a string after replacing the last occurrence of the supplied string.                  |
| `replaceN($search, $replacement, $numbers)`                            | **string**     | Returns a string after replacing the `N` occurrence of the supplied string.                   |
| `indexOf($search, $insensitive = FALSE)`                               | **int / bool** | Returns the index of the supplied string in the string.                                       |
| `lastIndexOf($search, $insensitive = FALSE)`                           | **int / bool** | Returns the last index of the supplied string in the string.                                  | 
| `countWords()`                                                         | **int**        | Returns number of words in the string separated by a space `' '`.                             |
| `contains($search)`                                                    | **bool**       | Tests if string has sub-string.                                                               |
| `equals($value)`                                                       | **bool**       | Tests of the string is equal to the provided string.                                          |
| `insertAt($value, $position)`                                          | **string**     | Insert the $value at the $position.                                                           |
| `leftTrim()`                                                           | **string**     | Returns Left-trimmed version of the string.                                                   |
| `rightTrim()`                                                          | **string**     | Returns Right-trimmed version of the string.                                                  |
| `trim()`                                                               | **string**     | Returns a trimmed version of the string.                                                      |
| `length()`                                                             | **int**        | Returns length of the string.                                                                 |
| `printf($format)`                                                      | **void**       | Prints the string with supplied format.                                                       | 
| `limit($limit = 100, $terminator = '...', $includeTerminator = FALSE)` | **string**     | Truncate and limit the string.                                                                |
| `frequency($search, $case_insensitive = true)`                         | **int**        | Counts the times supplied string appears in the string.                                       |
| `occurances($search, $case_insensitive = true)`                        | **int**        | Counts the times supplied string appears in the string.                                       |
| `rightPad($padWith, $length = 1)`                                      | **string**     | Returns a padded string with right-side padded with $length number of `$padWith`.             |
| `leftPad($padWith, $length = 1)`                                       | **string**     | Returns a padded string with left-side padded with $length number of `$padWith`.              |
| `pad($padWith, $length = 1)`                                           | **string**     | Returns a padded string with both sides padded with $length number of `$padWith`.             |
	

## Security

If you discover any security related issues, please email.

## Credits
- [All contributors](https://github.com/stahiralijan/stringer/graphs/contributors)