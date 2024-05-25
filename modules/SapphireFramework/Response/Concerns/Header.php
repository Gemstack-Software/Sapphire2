<?php
    namespace Sapphire\Response\Concerns;

    trait Header 
    {
        public static function SetHeader (string $header, string $value): void 
        {
            header("$header: $value");
        }
    }