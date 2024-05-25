<?php
    namespace Sapphire\Response\Concerns;

    trait ResponseExit 
    {
        public static function Exit(): void
        {
            exit();
        }

        public static function ExitWithStatus(int $status): void 
        {
            static::Status($status);
            exit();
        }
    }