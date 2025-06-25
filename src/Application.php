<?php

namespace Filip\Console;

use DirectoryIterator;

class Application 
{
    private array $commands = [];

    public function __construct(private string $namespace){}
    public function run(): int 
    {
        $this->registerCommands();

        echo "Hello from inside the application";
        
        return 0;
    }

    private function registerCommands(): void 
    {
        $commandFiles = new DirectoryIterator(__DIR__.'/Commands');

        foreach($commandFiles as $commandFile){
            if(!$commandFile->isFile()){
                continue;
            }
            $command = $this->namespace.pathinfo($commandFile, PATHINFO_FILENAME);
            $commandName = $command::getName();

            $this->commands[$commandName] = $command;
        }

        dd($this->commands);
    }
}