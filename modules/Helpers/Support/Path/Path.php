<?php
    namespace Helpers\Support;

    use Helpers\Support\Str;

    class Path
    {
        /**
         * Changes packageFormat into real path
         * Example: src.components.App -> src/components/App
         * 
         * Parameters:
         * string $additionalExtension - require "." at first char
         */
        public static function PackageFormatToRealPath(string $package, string $additionalExtension = '', bool $basedirAsPrefix = false)
        {
            $packageString = new Str($package);
            $pathString = $packageString->Replace('.', '/');

            // Adding extension
            if ($additionalExtension !== '')
            {
                $pathString->Add($additionalExtension); 
            }

            // Adding prefix
            if($basedirAsPrefix)
            {
                return BASE_DIR . '/' .$pathString->Get();
            }

            return $pathString->Get();
        }
    }