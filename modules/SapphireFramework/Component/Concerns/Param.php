<?php
    namespace Sapphire\Component\Concerns;

    trait Param 
    {
        public function Param(string $name)
        {
            return $this->Store('params')[$name];
        }
    }
