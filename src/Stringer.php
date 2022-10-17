<?php

namespace Stahiralijan\Stringer;

class Stringer
{
	private $string;
	
	/**
	 * @param string $string
	 */
	public function __construct (string $string = '')
	{
		$this->string = $string;
	}
	
	/**
	 * @return string
	 */
	public function __toString (): string
	{
		return $this->string;
	}
	
	/**
	 * Returns a string containing a specified number of characters from the left side of a string.
	 *
	 * @param int $length
	 *
	 * @return string
	 */
	public function left (int $length): string
	{
		return mb_substr($this->string, 0, $length);
	}
	
	/**
	 * Returns a string containing a specified number of characters from the right side of a string.
	 *
	 * @param int $length
	 *
	 * @return string
	 */
	public function right (int $length): string
	{
		return mb_substr($this->string, (mb_strlen($this->string) - $length), mb_strlen($this->string));
	}
	
	/**
	 * Tests if string has sub-string.
	 *
	 * @param string $needle
	 * @param bool   $insensitive
	 *
	 * @return bool
	 */
	public function has (string $needle, bool $case_insensitive = FALSE): bool
	{
		if ($case_insensitive)
		{
			return mb_stripos($this->string, $needle) !== FALSE;
		}
		
		return str_contains($this->string, $needle);
	}
	
	/**
	 * Returns the upper-case version of the string.
	 *
	 * @return string
	 */
	public function toUpper (): string
	{
		return mb_strtoupper($this->string);
	}
	
	/**
	 * Returns the lower-case version of the string.
	 *
	 * @return string
	 */
	public function toLower (): string
	{
		return mb_strtolower($this->string);
	}
	
	/**
	 * Returns the lower-case version of the string.
	 *
	 * @return string
	 */
	public function toTitle (): string
	{
		return mb_convert_case($this->string, MB_CASE_TITLE, 'UTF-8');
	}
	
	/**
	 * Returns the upper-case version of the sub-string.
	 *
	 * @param int $start
	 * @param int $length
	 *
	 * @return string
	 */
	public function substrUpper (int $start = 0, int $length = 1): string
	{
		if ($start < 0)
		{
			return mb_substr($this->string, 0, mb_strlen($this->string) + $start) . mb_convert_case(mb_substr($this->string, $start, $length), MB_CASE_UPPER);
		}
		
		return mb_convert_case(mb_substr($this->string, $start, $length), MB_CASE_UPPER) . mb_substr($this->string, 1);
	}
	
	/**
	 *  Returns the lower-case version of the sub-string.
	 *
	 * @param int $start
	 * @param int $length
	 *
	 * @return string
	 */
	public function substrLower (int $start = 0, int $length = 1): string
	{
		if ($start < 0)
		{
			return mb_substr($this->string, 0, mb_strlen($this->string) + $start) . mb_convert_case(mb_substr($this->string, $start, $length), MB_CASE_LOWER);
		}
		
		return mb_convert_case(mb_substr($this->string, $start, $length), MB_CASE_LOWER) . mb_substr($this->string, 1);
	}
	
	/**
	 * Returns a capitalized version of the string.
	 *
	 * @return string
	 */
	public function capitalize (): string
	{
		return mb_convert_case(mb_substr($this->string, 0, 1), MB_CASE_UPPER) . mb_substr($this->string, 1);
	}
	
	/**
	 * Returns a title-case version of the string.
	 *
	 * @return string
	 */
	public function titleCase (): string
	{
		return mb_convert_case($this->string, MB_CASE_TITLE);
	}
	
	/**
	 * Returns array of characters of the string.
	 *
	 * @param int $length
	 *
	 * @return array
	 */
	public function toCharArray (int $length = 1): array
	{
		return str_split($this->string, $length);
	}
	
	/**
	 * Returns array of words of the string.
	 *
	 * @return array
	 */
	public function toWordsArray (): array
	{
		return explode(' ', $this->string);
	}
	
	/**
	 * Returns the sub-string of the string.
	 *
	 * @param int      $start
	 * @param int|null $length
	 *
	 * @return string
	 */
	public function substring (int $start = 0, int|null $length = NULL): string
	{
		return mb_substr($this->string, $start, $length);
	}
	
	/**
	 * Returns string before the supplied word.
	 *
	 * @param string $search
	 * @param bool   $includeWord
	 *
	 * @return string
	 */
	public function before (string $search, bool $includeWord = FALSE): string
	{
		$indexOfSearch = mb_strpos($this->string, $search);
		if ($indexOfSearch !== FALSE)
		{
			return mb_substr($this->string, 0, $includeWord ? $indexOfSearch + mb_strlen($search) : $indexOfSearch);
		}
		
		return $this->string;
	}
	
	/**
	 * Returns string after the supplied word.
	 *
	 * @param string $search
	 * @param bool   $includeWord
	 *
	 * @return string
	 */
	public function after (string $search, bool $includeWord = FALSE): string
	{
		$indexOfSearch = mb_strpos($this->string, $search);
		if ($indexOfSearch !== FALSE)
		{
			return mb_substr($this->string, $includeWord ? $indexOfSearch : $indexOfSearch + mb_strlen($search), mb_strlen($this->string) - $indexOfSearch);
		}
		
		return $this->string;
	}
	
	/**
	 * @param int  $start
	 * @param int  $end
	 * @param bool $includeWords
	 *
	 * @return string
	 */
	public function between (int $start, int $end, bool $includeWords = FALSE): string
	{
		$str          = $this->string;
		$this->string = $this->after($start, $includeWords);
		$str2         = $this->before($end, $includeWords);
		$this->string = $str;
		
		return $str2;
	}
	
	/**
	 * Tests if the string starts with the supplied string.
	 *
	 * @param string $search
	 *
	 * @return bool
	 */
	public function startsWith (string $search): bool
	{
		$test = mb_substr($this->string, 0, mb_strlen($search));
		
		return $search === $test;
	}
	
	/**
	 * Tests if the string ends with the supplied string.
	 *
	 * @param $search
	 *
	 * @return bool
	 */
	public function endsWith ($search): string
	{
		$test = mb_substr($this->string, mb_strlen($this->string) - mb_strlen($search));
		
		return $test === $search;
	}
	
	/**
	 * Returns a reversed version of the string.
	 *
	 * @return string
	 */
	public function reverse (): string
	{
		return strrev($this->string);
	}
	
	/**
	 * Returns a reversed-case of the string.
	 *
	 * @return string
	 */
	public function reverseCase (): string
	{
		return mb_strtolower($this->string) ^ mb_strtoupper($this->string) ^ $this->string;
	}
	
	/**
	 * Reverses the order of the string.
	 *
	 * @return string
	 */
	public function reverseOrder (): string
	{
		return implode(' ', array_reverse(explode(' ', $this->string)));
	}
	
	/**
	 * Returns a slugged version of the string.
	 *
	 * @param string $delimiter
	 *
	 * @return string
	 */
	public function toSlug (string $delimiter = '-'): string
	{
		$washed = $this->simplify();
		$lower  = mb_strtolower($washed);
		
		return str_replace(' ', $delimiter, $lower);
	}
	
	/**
	 * Removes the special characters from the string.
	 *
	 * @return string
	 */
	public function simplify (): string
	{
		$washed = preg_replace('/[^\x20-\x7E]/u', '', $this->string);
		
		return str_replace($this->specialChars(), '', $washed);
	}
	
	/**
	 * Returns a string after replacing all occurrences of the supplied string.
	 *
	 * @param string $search
	 * @param string $replacement
	 *
	 * @return mixed
	 */
	public function replaceAll (string $search, string $replacement): string
	{
		return str_replace($search, $replacement, $this->string);
	}
	
	/**
	 * Returns a string after replacing the first occurrence of the supplied string.
	 *
	 * @param string $search
	 * @param string $replacement
	 *
	 * @return mixed
	 */
	public function replaceFirst (string $search, string $replacement): string
	{
		$pos = $this->indexOf($this->string, $search);
		
		return substr_replace($this->string, $replacement, $pos, strlen($search));
	}
	
	/**
	 * Returns a string after replacing the last occurrence of the supplied string.
	 *
	 * @param string $search
	 * @param string $replacement
	 *
	 * @return mixed
	 */
	public function replaceLast (string $search, string $replacement): string
	{
		$pos = $this->lastIndexOf($this->string, $search);
		
		return substr_replace($this->string, $replacement, $pos, strlen($search));
	}
	
	/**
	 * Returns a string after replacing the N occurrence of the supplied string.
	 *
	 * @param string $search
	 * @param string $replacement
	 * @param int    $numbers
	 *
	 * @return string
	 */
	public function replaceN (string $search, string $replacement,  int $numbers): string
	{
		$str = $this->string;
		if ($this->has($search))
		{
			if ($numbers > 0)
			{
				for ($i = 0; $i < $numbers; $i++)
				{
					$this->string = $this->replaceFirst($search, $replacement);
				}
			}
			else
			{
				for ($i = 0; $i < abs($numbers); $i++)
				{
					$this->string = $this->replaceLast($search, $replacement);
				}
			}
		}
		$t            = $this->string;
		$this->string = $str;
		
		return $t;
	}
	
	/**
	 * Returns the index of the supplied string in the string.
	 *
	 * @param string $search
	 * @param bool   $insensitive
	 *
	 * @return int|bool
	 */
	public function indexOf (string $search, bool $insensitive = FALSE): int|bool
	{
		if ($insensitive)
		{
			return stripos($this->string, $search);
		}
		
		return strpos($this->string, $search);
	}
	
	/**
	 * Returns the last index of the supplied string in the string.
	 *
	 * @param string $search
	 * @param bool   $insensitive
	 *
	 * @return int|bool
	 */
	public function lastIndexOf (string $search, bool $insensitive = FALSE): int|bool
	{
		if ($insensitive)
		{
			return strripos($this->string, $search);
		}
		
		return strrpos($this->string, $search);
	}
	
	/**
	 * Returns number of words in the string separated by a space ' '.
	 *
	 * @return int
	 */
	public function countWords (): int
	{
		$arr = array_filter(explode(' ', $this->string));
		
		return count($arr);
	}
	
	/**
	 * Tests if string has sub-string.
	 *
	 * @param $search
	 *
	 * @return bool
	 */
	public function contains (string $search): bool
	{
		return $this->has($search);
	}
	
	/**
	 * Tests of the string is equal to the provided string.
	 *
	 * @param $value
	 *
	 * @return bool
	 */
	public function equals ($value): bool
	{
		return $this->string === $value;
	}
	
	/**
	 * Insert the $value at the $position.
	 *
	 * @param string $value
	 * @param int    $position
	 *
	 * @return string
	 */
	public function insertAt (string $value, int $position): string
	{
		return substr_replace($this->string, $value, $position, 0);
	}
	
	/**
	 * Returns Left-trimmed version of the string.
	 *
	 * @return string
	 */
	public function leftTrim (): string
	{
		return ltrim($this->string);
	}
	
	/**
	 * Returns Right-trimmed version of the string.
	 *
	 * @return string
	 */
	public function rightTrim (): string
	{
		return rtrim($this->string);
	}
	
	/**
	 * Returns a trimmed version of the string.
	 *
	 * @return string
	 */
	public function trim (): string
	{
		return trim($this->string);
	}
	
	/**
	 * Returns length of the string.
	 *
	 * @return int
	 */
	public function length (): int
	{
		return mb_strlen($this->string);
	}
	
	/**
	 * Prints the string with supplied format
	 *
	 * @param string $format
	 */
	public function printf (string $format): void
	{
		print(sprintf($format, $this->string));
	}
	
	/**
	 * Truncate and limit the string.
	 *
	 * @param int    $limit
	 * @param string $terminator
	 * @param bool   $includeTerminator
	 *
	 * @return string
	 */
	public function limit (int $limit = 100, string $terminator = '...', bool $includeTerminator = FALSE): string
	{
		if ($includeTerminator)
		{
			return trim(mb_substr($this->string, 0, $limit - mb_strlen($terminator))) . $terminator;
		}
		
		return trim(mb_substr($this->string, 0, $limit)) . $terminator;
	}
	
	/**
	 * Counts the times supplied string appears in the string.
	 *
	 * @param string $search
	 * @param bool   $case_insensitive
	 *
	 * @return int
	 */
	public function frequency (string $search, bool $case_insensitive = TRUE): int
	{
		return mb_substr_count($case_insensitive ? $this->toLower() : $this->string, $search);
	}
	
	/**
	 * Counts the times supplied string appears in the string.
	 *
	 * @param string $search
	 * @param bool   $case_insensitive
	 *
	 * @return int
	 */
	public function occurrences (string $search, bool $case_insensitive = TRUE): int
	{
		return $this->frequency($search, $case_insensitive);
	}
	
	/**
	 * Returns a padded string with right-side padded with $length number of $padWith.
	 *
	 * @param string $padWith
	 * @param int    $length
	 *
	 * @return string
	 */
	public function rightPad (string $padWith, int $length = 1): string
	{
		return str_pad($this->string, $length, $padWith, STR_PAD_RIGHT);
	}
	
	/**
	 * Returns a padded string with left-side padded with $length number of $padWith.
	 *
	 * @param string $padWith
	 * @param int    $length
	 *
	 * @return string
	 */
	public function leftPad (string $padWith, int $length = 1): string
	{
		return str_pad($this->string, $length, $padWith, STR_PAD_LEFT);
	}
	
	/**
	 * Returns a padded string with both sides padded with $length number of $padWith.
	 *
	 * @param string $padWith
	 * @param int    $length
	 *
	 * @return string
	 */
	public function pad (string $padWith, int $length = 1): string
	{
		return str_pad($this->string, $length, $padWith, STR_PAD_BOTH);
	}
	
	/**
	 * @return array
	 */
	private function specialChars () : array
	{
		return [
			'``', '~', '!', '@', '#', '$', '%', '^', '*', '(', ')', '_', '-', '=', '+', '{', '}', '[',
			']', '\\', '|', ';', ':', '\'', '"', ',', '<', '.', '>', '/', '?', '&',
		];
	}
}
