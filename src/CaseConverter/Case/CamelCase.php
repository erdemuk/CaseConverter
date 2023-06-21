<?php

namespace CaseConverter\Case;

use CaseConverter\Abstract\BaseCase;
use CaseConverter\Helpers;

class CamelCase extends BaseCase
{
    public static function convertWordsToCase(array $words): string
    {
        return Helpers\Pipe::with(
            fn($words) => array_map(fn($word) => ucfirst($word), $words),
            'implode',
            'lcfirst'
        )($words);
    }

    public static function parse(string $string) : array
    {
        return preg_split('/(?=[A-Z])/', $string, -1, PREG_SPLIT_NO_EMPTY);
    }
}