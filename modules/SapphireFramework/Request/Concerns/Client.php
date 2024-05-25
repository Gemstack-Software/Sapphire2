<?php
    namespace Sapphire\Request\Concerns;

    trait Client
    {
        public static function GetClientIP(): string 
        {
            return $_SERVER["REMOTE_ADDR"];
        }
    }