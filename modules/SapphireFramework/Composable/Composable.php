<?php   
    namespace Sapphire;
    use Helpers\Support\Str;

    class Composable
    {
        /**
         * Import composable from src.composables path
         */
        public static function Composable(string $composable, ...$parameters)
        {
            return static::FromGlobal('src.composables.' . $composable, ...$parameters);
        }

        /**
         * Import composable from global path
         */
        public static function FromGlobal(string $composable, ...$parameters)
        {
            if($composable === '')
            {
                return;
            }

            $composableString = new Str($composable);
            $composableString->ReplaceLeaving('.', '/');

            $path = '' . $composableString->Get() . '.php';

            return \Helpers\Import($path)(...$parameters);
        }
    }