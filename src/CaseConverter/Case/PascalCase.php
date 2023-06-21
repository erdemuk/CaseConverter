<?php

namespace CaseConverter\Case;
use CaseConverter\CaseDetector;

class PascalCase
{
    public static function convert($string): string
    {
        $originalCase = CaseDetector::detectCase($string);

        switch ($originalCase) {
            case 'snake_case':
                $string = self::convertFromSnakeCase($string);
                break;
            case 'kebab-case':
                $string = self::convertFromKebabCase($string);
                break;
            case 'camelCase':
                $string = self::convertFromCamelCase($string);
                break;
            case 'space case':
                $string = self::convertFromSpaceCase($string);
                break;
            default:
                $string = $string;
        }

        return $string;
    }

    public static function convertFromSnakeCase($input): string
    {
        return str_replace('_', '', ucwords($input, '_'));
    }

    public static function convertFromKebabCase($input): string
    {
        return str_replace('-', '', ucwords($input, '-'));
    }

    public static function convertFromCamelCase($input): string
    {
        return ucfirst($input);
    }

    public static function convertFromSpaceCase($input): string
    {
        return str_replace(' ', '', ucwords($input));
    }
}