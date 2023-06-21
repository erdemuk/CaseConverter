<?php

namespace CaseConverter\Abstract;

use CaseConverter\CaseDetector;

abstract class BaseCase
{
    public static function convert($input, $fromCase = null): string
    {
        $words = CaseDetector::parse($input, $fromCase);

        return static::convertWordsToCase($words);
    }

    abstract public static function convertWordsToCase(array $words): string;
    abstract public static function parse(string $string) : array;
}