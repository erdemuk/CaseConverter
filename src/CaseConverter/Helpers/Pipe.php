<?php 

namespace CaseConverter\Helpers;

class Pipe
{
    public static function with(callable ...$fns) {
        return fn(...$args) => array_reduce($fns, fn($acc, $fn) => call_user_func($fn, $acc), ...$args);
    }
}