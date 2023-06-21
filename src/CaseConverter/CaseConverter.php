<?php

namespace CaseConverter;

use CaseConverter\Abstract\BaseCase;

class CaseConverter
{
    public static function convertCase($input, BaseCase $case, BaseCase $fromCase = null)
    {            
        if (is_string($input)) {
            return self::convertStringCase($input, $case, $fromCase);
        } elseif (is_array($input)) {
            return self::convertArrayKeysCase($input, $case, $fromCase);
        } else {
            return $input;
        }
    }

    protected static function convertStringCase(string $string, BaseCase $convertClass, BaseCase $fromCase = null)
    {                        
        // Check if conversion rule exists for the given cases
        if (isset($convertClass)) {
            $convertedString = $convertClass::convert($string, $fromCase);
        } else {
            // Handle other cases or fallback
            $convertedString = $string;
        }

        return $convertedString;
    }


    private static function convertArrayKeysCase(array $array, BaseCase $case, BaseCase $fromCase = null): array
    {
        return array_combine(
            array_map(fn ($key) => self::convertStringCase($key, $case, $fromCase), array_keys($array)),
            array_map(fn ($value) => is_array($value) ? self::convertArrayKeysCase($value, $case, $fromCase) : $value, $array)
        );
    }
}
