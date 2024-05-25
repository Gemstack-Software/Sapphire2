<?php
    namespace Sapphire\Response\Concerns;

    trait Status 
    {
        public static function Status(int $status): void 
        {
            http_response_code ($status);
        }
    }