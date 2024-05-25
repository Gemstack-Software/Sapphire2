<?php
    namespace Helpers\Support\Str\Concerns;
    use Helpers\Support\Str;

    trait Contains
    {
        public function Contains(string $other): bool
        {
            return stristr($this->content, $other);
        }
    }