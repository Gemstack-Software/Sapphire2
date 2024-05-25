<?php
    namespace Acid\Compiler\Concerns;

    trait Acid4ElementUuid 
    {
        static int $acid4ElementIndex = 0;

        public static function GenerateAcid4ElementUuid(): string
        {
            return md5 (
                hash( 'sha256', ++static::$acid4ElementIndex )
            );
        }
    }