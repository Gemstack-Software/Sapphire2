<?php
    namespace Sapphire\Request\Concerns;
    use Sapphire\Request;

    trait Current
    {
        public static function Current()
        {
            return new Request;
        }
    }