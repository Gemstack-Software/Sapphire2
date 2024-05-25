<?php
    namespace Helpers\Formats\JSON\Concerns;

    trait ToString 
    {
        /**
         * Stringify the JSON Object
         */
        public static function ObjectToString($jsonObject): string|null 
        {
            if (!static::ValidJsonObject($jsonObject))
            {
                throw new \Helpers\Formats\JSON\Exceptions\NotValidJsonObjectException;

                return null;
            }

            return json_encode($jsonObject);
        }

        /**
         * Stringify other value
         */
        public static function ValueToString($otherObject): string|null
        {
            return json_encode($otherObject);
        }
    }