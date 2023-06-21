<?php 

namespace CaseConverter;

class CaseDetector
{
    public static function detectCase($string): string
    {
        if (strpos($string, '_') !== false) {
            return 'snake_case';
        } elseif (strpos($string, '-') !== false) {
            return 'kebab-case';
        } elseif (strpos($string, ' ') !== false) {
            return 'space case';            
        } elseif (preg_match('/^[a-z][A-Za-z0-9]*$/', $string)) {
            return 'camelCase';
        } elseif (preg_match('/^[A-Z][A-Za-z0-9]*$/', $string)) {
            return 'PascalCase';
        } else {
            return 'other';
        }
    }
}