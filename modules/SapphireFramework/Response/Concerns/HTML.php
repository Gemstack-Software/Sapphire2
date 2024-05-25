<?php
    namespace Sapphire\Response\Concerns;

    trait HTML 
    {
        public static function HTML(string $html): void
        {
            echo $html;
        
            static::SetHeader('Content-Type', 'text/html');
            static::ExitWithStatus(200);
        }
    }