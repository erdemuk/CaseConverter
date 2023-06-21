<?php

namespace CaseConverter\Case;

use CaseConverter\Abstract\BaseCase;

class SnakeCase extends BaseCase
{
    public static function convertWordsToCase(array $words): string
    {
        return implode('_', $words);
    }
    
    public static function parse(string $string) : array
    {
        return explode('_', $string);
    }
}