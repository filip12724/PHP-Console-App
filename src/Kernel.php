<?php

namespace Filip\Console;

class Kernel 
{
    public function __construct(private Application $application){}

    public function handle(): int 
    {
        $status = $this->application->run();

        return $status;
    }
}