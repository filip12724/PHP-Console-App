<?php

namespace Filip\Console;

use DirectoryIterator;

class Application 
{
    private array $commands = [];
    private array $args = [];
    
    public function __construct(private string $namespace, private array $argv){}

    public function run(): int  
    {
        $this->registerCommands();
        $this->parseOptions();
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
    }

    private function parseOptions(): void 
    {
        if(!isset($this->argv[1])){
            throw new CommandException('Command not provided');
        }

        $this->args = array_slice($this->argv,2);
    }
}