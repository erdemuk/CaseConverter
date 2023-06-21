<?php

namespace CaseConverter\Case;
use CaseConverter\CaseDetector;

class KebabCase
{
    public static function convert($string): string
    {
        $originalCase = CaseDetector::detectCase($string);

        switch ($originalCase) {
            case 'snake_case':
                $string = self::convertFromSnakeCase($string);
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

    public static function convertFromSnakeCase($input): string
    {
        return str_replace('_', '-', $input);
    }

    public static function convertFromCamelCase($input): string
    {
        return strtolower(preg_replace('/([a-z])([A-Z])/', '$1-$2', $input));
    }

    public static function convertFromPascalCase($input): string
    {
        return strtolower(preg_replace('/([a-z0-9])([A-Z])/', '$1-$2', $input));
    }

    public static function convertFromSpaceCase($input): string
    {
        return str_replace(' ', '-', strtolower($input));
    }
}