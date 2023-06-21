<?php 

namespace CaseConverter;

use CaseConverter\Case;

class CaseDetector
{
    public static function detect($string): string
    {
        if (strpos($string, '_') !== false) {
            return Case\SnakeCase::class;
        } elseif (strpos($string, '-') !== false) {
            return Case\KebabCase::class;
        } elseif (strpos($string, ' ') !== false) {
            return Case\SpaceCase::class;            
        } elseif (preg_match('/^[a-z][A-Za-z0-9]*$/', $string)) {
            return Case\CamelCase::class;
        } elseif (preg_match('/^[A-Z][A-Za-z0-9]*$/', $string)) {
            return Case\PascalCase::class;
        } else {
            return false;
        }
    }

    // parse the detected case and return an array of words
    public static function parse($string, $fromCase = null): array
    {
        if ($fromCase) {
            $case = $fromCase;
        } else {
            $case = self::detect(trim($string));
        }

        if (!$case) {
            return $string;
        }

        return array_map('mb_strtolower', $case::parse($string));
    }
}