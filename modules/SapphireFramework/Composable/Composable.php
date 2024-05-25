<?php   
    namespace Sapphire;
    use Helpers\Support\Str;

    class Composable
    {
        public static function Composable(string $composable, ...$parameters)
        {
            if($composable === '')
            {
                return;
            }

            $composableString = new Str($composable);
            $composableString->ReplaceLeaving('.', '/');

            $path = 'src/composables/' . $composableString->Get() . '.php';

            return \Helpers\Import($path)(...$parameters);
        }
    }