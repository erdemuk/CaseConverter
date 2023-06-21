<?php

namespace CaseConverter;
use CaseConverter\Case;

class CaseConverter
{
    protected static array $caseClasses = [
        'snake_case' => Case\SnakeCase::class,
        'kebab-case' => Case\KebabCase::class,
        'camelCase' => Case\CamelCase::class,
        'PascalCase' => Case\PascalCase::class,
        'space case' => Case\SpaceCase::class,
    ];

    public static function convertCase($input, string $case)
    {            
        if (is_string($input)) {
            return self::convertStringCase($input, $case);
        } elseif (is_array($input)) {
            return self::convertArrayKeysCase($input, $case);
        } else {
            return $input;
        }
    }

    protected static function convertStringCase(string $string, string $case)
    {                        
        // Check if conversion rule exists for the given cases
        if (isset(self::$caseClasses[$case])) {
            $convertClass = self::$caseClasses[$case];
            $convertedString = $convertClass::convert($string);
        } else {
            // Handle other cases or fallback
            $convertedString = $string;
        }

        return $convertedString;
    }


    private static function convertArrayKeysCase(array $array, string $case): array
    {
        return array_combine(
            array_map(fn ($key) => self::convertStringCase($key, $case), array_keys($array)),
            array_map(fn ($value) => is_array($value) ? self::convertArrayKeysCase($value, $case) : $value, $array)
        );
    }
}
