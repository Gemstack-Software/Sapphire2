<?php
    namespace Sapphire\Application\Concerns;
    use Sapphire\Application;

    trait Run
    {
        public static function Run(array $config): Application
        {
            return new Application($config);
        }        
    }