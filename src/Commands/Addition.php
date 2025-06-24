<?php

namespace Filip\Console\Commands;

class Addition 
{
    private static string $name = 'math:addition';

    public function execute(): int 
    {
        echo "hello from inside the addition".PHP_EOL;
        
        return 0;
    }

    public static function getName(): string 
    {
        return static::$name;
    }
}