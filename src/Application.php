<?php

namespace Filip\Console;

use DirectoryIterator;

class Application 
{
    public function run(): int 
    {
        $this->registerCommands();

        echo "Hello from inside the application";
        
        return 0;
    }

    private function registerCommands(): void 
    {
        $commandFiles = new DirectoryIterator(__DIR__.'/Commands');

        dd($commandFiles);
    }
}