<?php
    namespace Helpers\Formats\JSON\Concerns;

    use \Helpers\Formats\JSON\Exceptions\NotValidJsonObjectException;

    trait ToJSON 
    {
        /**
         * String to JSON object
         */
        public static function ToJSON(string $jsonString): \stdClass|null 
        {
            if (!static::ValidJsonString($jsonString))
            {
                throw new NotValidJsonObjectException;

                return null;
            }

            return json_decode($jsonString);
        }
    }