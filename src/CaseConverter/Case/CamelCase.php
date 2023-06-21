<?php

namespace CaseConverter\Case;
use CaseConverter\CaseDetector;

class CamelCase
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
        return lcfirst(str_replace('_', '', ucwords($input, '_')));
    }

    public static function convertFromKebabCase($input): string
    {
        return lcfirst(preg_replace_callback(
            '/-(.)/',
            function ($matches) {
                return strtoupper($matches[1]);
            },
            $input
        ));
    }

    public static function convertFromPascalCase($input): string
    {
        return lcfirst($input);
    }

    public static function convertFromSpaceCase($input): string
    {
        return preg_replace_callback('/\s+(.)/', static fn($matches) => ucfirst($matches[1]), $input);
    }
}