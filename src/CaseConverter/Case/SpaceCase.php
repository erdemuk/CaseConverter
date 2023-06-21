<?php

namespace CaseConverter\Case;
use CaseConverter\CaseDetector;

class SpaceCase
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
            case 'PascalCase':
                $string = self::convertFromPascalCase($string);
                break;
            default:
                $string = $string;
        }

        return $string;
    }

    public static function convertFromSnakeCase($input): string
    {
        return str_replace('_', ' ', $input);
    }

    public static function convertFromKebabCase($input): string
    {
        return str_replace('-', ' ', $input);
    }

    public static function convertFromCamelCase($input): string
    {
        return strtolower(preg_replace('/([a-z])([A-Z])/', '$1 $2', $input));
    }

    public static function convertFromPascalCase($input): string
    {
        return strtolower(preg_replace('/(?<!^)[A-Z]/', ' $0', $input));
    }
}