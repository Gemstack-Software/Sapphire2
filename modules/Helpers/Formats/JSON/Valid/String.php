<?php
    namespace Helpers\Formats\JSON\Valid;

    trait ValidString
    {
        /**
         * Check if passed value is valid string 
         */

        public static function ValidJsonString(string $jsonString): bool 
        {
            if (gettype($jsonString) === "string")
            {
                return true;
            }

            return false;
        }
    }