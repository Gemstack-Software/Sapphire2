<?php
    namespace AquaCSS\Concerns;

    trait Globals
    {
        // global(string varName)
        public static function Global($matches)
        {
            global $__aquaCSSConfig;

            foreach($matches as $match)
            {
                $inside = substr($match, 8, strlen($match) - 10);

                return $__aquaCSSConfig->GetVariableValue($inside);
            }
        }
    }