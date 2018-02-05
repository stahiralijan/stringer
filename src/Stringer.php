<?php

    namespace Stahiralijan\Stringer;

    class Stringer
    {
        private $string;

        public function __construct($string = '')
        {
            $this->string = $string;
        }

        /**
         * Tests if string has the sensitive / insensitive sub-string
         *
         * @param      $needle
         * @param bool $insensitive
         *
         * @return bool
         */
        public function has($needle, $insensitive = FALSE): bool
        {
            $pos = mb_strpos($this->string, $needle);
            if ($insensitive)
            {
                $pos = mb_stripos($this->string, $needle);
            }

            return $pos !== FALSE;
        }

        /**
         * Returns the upper-case version of the string
         *
         * @return string
         */
        public function toUpper()
        {
            return mb_strtoupper($this->string);
        }

        /**
         * @return mixed|string
         */
        public function toLower()
        {
            return mb_strtolower($this->string);
        }

        /**
         * @return string
         */
        public function toTitle()
        {
            return mb_convert_case($this->string, MB_CASE_TITLE, 'UTF-8');
        }

        /**
         * @param int $start
         * @param int $length
         *
         * @return string
         */
        public function substrUpper($start = 0, $length = 1)
        {
            if ($start < 0)
            {
                return mb_substr($this->string, 0, mb_strlen($this->string) + $start) . mb_convert_case(mb_substr($this->string, $start, $length), MB_CASE_UPPER);
            }

            return mb_convert_case(mb_substr($this->string, $start, $length), MB_CASE_UPPER) . mb_substr($this->string, 1);
        }

        /**
         * @param int $start
         * @param int $length
         *
         * @return string
         */
        public function substrLower($start = 0, $length = 1)
        {
            if ($start < 0)
            {
                return mb_substr($this->string, 0, mb_strlen($this->string) + $start) . mb_convert_case(mb_substr($this->string, $start, $length), MB_CASE_LOWER);
            }

            return mb_convert_case(mb_substr($this->string, $start, $length), MB_CASE_LOWER) . mb_substr($this->string, 1);
        }

        /**
         * @return string
         */
        public function capitalize()
        {
            return mb_convert_case(mb_substr($this->string, 0, 1), MB_CASE_UPPER) . mb_substr($this->string, 1);
        }

        /**
         * @return mixed|string
         */
        public function titleCase()
        {
            return mb_convert_case($this->string, MB_CASE_TITLE);
        }

        /**
         * @param int $length
         *
         * @return array
         */
        public function toCharArray($length = 1)
        {
            return str_split($this->string, $length);
        }

        /**
         * @return string[]
         */
        public function toWordsArray()
        {
            return array_filter(mb_split(' ', $this->string));
        }

        public function __toString()
        {
            return $this->string;
        }

        /**
         * @param int  $start
         * @param null $length
         *
         * @return string
         */
        public function substring($start = 0, $length = NULL)
        {
            return mb_substr($this->string, $start, $length);
        }

        /**
         * @param      $search
         * @param bool $includeWord
         *
         * @return string
         */
        public function before($search, $includeWord = FALSE)
        {
            $indexOfSearch = mb_strpos($this->string, $search);
            if (gettype($indexOfSearch) === 'integer')
            {
                return mb_substr($this->string, 0, $includeWord ? $indexOfSearch + mb_strlen($search) : $indexOfSearch);
            }

            return $this->string;
        }

        /**
         * @param      $search
         * @param bool $includeWord
         *
         * @return string
         */
        public function after($search, $includeWord = FALSE)
        {
            $indexOfSearch = mb_strpos($this->string, $search);
            if (gettype($indexOfSearch) === 'integer')
            {
                return mb_substr($this->string, $includeWord ? $indexOfSearch : $indexOfSearch + mb_strlen($search), mb_strlen($this->string) - $indexOfSearch);
            }

            return $this->string;
        }

        /**
         * @param      $start
         * @param      $end
         * @param bool $includeWords
         *
         * @return string
         */
        public function between($start, $end, $includeWords = FALSE)
        {
            $str = $this->string;
            $this->string = $this->after($start, $includeWords);
            $str2 = $this->before($end, $includeWords);
            $this->string = $str;

            return $str2;
        }

        /**
         * @param $search
         *
         * @return bool
         */
        public function startsWith($search)
        {
            $test = mb_substr($this->string, 0, mb_strlen($search));

            return $search === $test;
        }

        /**
         * @param $search
         *
         * @return bool
         */
        public function endsWith($search)
        {
            $test = mb_substr($this->string, mb_strlen($this->string) - mb_strlen($search));

            return $test === $search;
        }

        /**
         * @return string
         */
        public function reverse()
        {
            return strrev($this->string);
        }

        /**
         * @return int
         */
        public function reverseCase()
        {
            return mb_strtolower($this->string) ^ mb_strtoupper($this->string) ^ $this->string;
        }

        /**
         * @param string $delimiter
         *
         * @return string
         */
        public function toSlug($delimiter = '-')
        {
            $washed = $this->simplify();
            $arr = array_filter(explode(' ', $washed));
            $arr = array_map('mb_strtolower', $arr);

            return implode($delimiter, $arr);
        }

        /**
         * @return mixed
         */
        public function simplify()
        {
            $washed = preg_replace('/[^\x20-\x7E]/u', '', $this->string);
            return str_replace($this->specialChars(), '', $washed);
        }

        /**
         * @param        $search
         * @param string $replacement
         *
         * @return mixed
         */
        public function replaceAll($search, string $replacement)
        {
            return str_replace($search, $replacement, $this->string);
        }

        /**
         * @param $search
         * @param $replacement
         *
         * @return mixed
         */
        public function replaceFirst($search, $replacement)
        {
            $pos = $this->indexOf($this->string, $search);

            return substr_replace($this->string, $replacement, $pos, strlen($search));
        }

        /**
         * @param $search
         * @param $replacement
         *
         * @return mixed
         */
        public function replaceLast($search, $replacement)
        {
            $pos = $this->lastIndexOf($this->string, $search);

            return substr_replace($this->string, $replacement, $pos, strlen($search));
        }

        /**
         * @param $search
         * @param $replacement
         * @param $numbers
         *
         * @return string
         */
        public function replaceN($search, $replacement, $numbers)
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
                if ($numbers < 0)
                {
                    for ($i = 0; $i < abs($numbers); $i++)
                    {
                        $this->string = $this->replaceLast($search, $replacement);
                    }
                }
            }
            $t = $this->string;
            $this->string = $str;

            return $t;
        }

        /**
         * @param      $search
         * @param bool $insensitive
         *
         * @return bool|int
         */
        public function indexOf($search, $insensitive = FALSE)
        {
            if ($insensitive)
            {
                return stripos($this->string, $search);
            }

            return strpos($this->string, $search);
        }

        /**
         * @param      $search
         * @param bool $insensitive
         *
         * @return bool|int
         */
        public function lastIndexOf($search, $insensitive = FALSE)
        {
            if ($insensitive)
            {
                return strripos($this->string, $search);
            }

            return strrpos($this->string, $search);
        }

        /**
         * @return int
         */
        public function countWords()
        {
            $arr = array_filter(explode(' ', $this->string));
            return count($arr);
        }

        /**
         * @param $search
         *
         * @return bool
         */
        public function contains($search)
        {
            return $this->has($search);
        }

        /**
         * @param $value
         *
         * @return bool
         */
        public function equals($value)
        {
            return $this->string === $value;
        }

        /**
         * @param $value
         * @param $position
         *
         * @return mixed
         */
        public function insertAt($value, $position)
        {
            return substr_replace($this->string, $value, $position, 0);
        }

        /**
         * @return string
         */
        public function leftTrim()
        {
            return ltrim($this->string);
        }

        /**
         * @return string
         */
        public function rightTrim()
        {
            return rtrim($this->string);
        }

        /**
         * @return string
         */
        public function trim()
        {
            return trim($this->string);
        }

        /**
         * @return int
         */
        public function length()
        {
            return mb_strlen($this->string);
        }

        /**
         * @param $format
         */
        public function printf($format)
        {
            sprintf($format, $this->string);
        }

        /**
         * @param int    $limit
         * @param string $terminator
         * @param bool   $includeTerminator
         *
         * @return string
         */
        public function limit($limit = 100, $terminator = '...', $includeTerminator = FALSE)
        {
            if($includeTerminator)
            {
                return mb_substr($this->string, 0, $limit - mb_strlen($terminator)) . $terminator;
            }
            return mb_substr($this->string, 0, $limit) . $terminator;
        }

        /**
         * @return array
         */
        private function specialChars()
        {
            return [
                '``', '~', '!', '@', '#', '$', '%', '^', '*', '(', ')', '_', '-', '=', '+', '{', '}', '[',
                ']', '\\', '|', ';', ':', '\'', '"', ',', '<', '.', '>', '/', '?', '&',
            ];
        }
    }
