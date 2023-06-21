<?php

namespace CaseConverter\Case;
use CaseConverter\CaseDetector;

class SnakeCase
{
    public static function convert($string): string
    {
        $originalCase = CaseDetector::detectCase($string);

        switch ($originalCase) {
            case 'kebab-case':
                $string = self::convertFromKebabCase($string);
                break;
            case 'camelCase':
                $string = self::convertFromCamelCase($string);
                break;
            case 'PascalCase':
                $string = self::convertFromPascalCase($string);
                break;
            case 'space case':
                $string = self::convertFromSpaceCase($string);
                break;
            default:
                $string = $string;
        }

        return $string;
    }

    public static function convertFromKebabCase($input): string
    {
        return str_replace('-', '_', $input);
    }

    public static function convertFromCamelCase($input): string
    {
        return strtolower(preg_replace('/([a-z])([A-Z])/', '$1_$2', $input));
    }

    public static function convertFromPascalCase($input): string
    {
        return strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $input));
    }

    public static function convertFromSpaceCase($input): string
    {
        return strtolower(str_replace(' ', '_', $input));
    }
}