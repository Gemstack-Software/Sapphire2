<?php
    namespace Sapphire\Controller\Concerns;
    use Sapphire\Composable as SComposable;

    trait Composable
    {
        public static function Composable(string $composable, ...$parameters)
        {
            return SComposable::Composable($composable, ...$parameters);
        }
    }