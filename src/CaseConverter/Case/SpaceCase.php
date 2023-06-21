<?php

namespace CaseConverter\Case;

use CaseConverter\Abstract\BaseCase;

class SpaceCase extends BaseCase
{
    public static function convertWordsToCase(array $words): string
    {
        return implode(' ', $words);
    }
    
    public static function parse(string $string) : array
    {
        return explode(' ', $string);
    }
}