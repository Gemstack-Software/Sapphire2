<?php
    namespace Helpers\Support\Arr\Concerns;

    trait Length
    {
        public function Length(): int
        {
            return count($this->base);
        }
    }