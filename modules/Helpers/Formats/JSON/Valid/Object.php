<?php
    namespace Helpers\Formats\JSON\Valid;

    trait ValidObject
    {
        /**
         * Check if passed value is valid object 
         */

        public static function ValidJsonObject($jsonObject): bool 
        {
            if (gettype($jsonObject) === "object")
            {
                return true;
            }
            if(gettype($jsonObject) === gettype(json_decode('{"object":true}')))
            {
                return true;
            }
            if(gettype($jsonObject) === "array")
            {
                return true;
            }

            return false;
        }
    }