<?php
    namespace Helpers\Support\Str\Concerns;
    use Helpers\Support\Arr;

    trait Split
    {
        public function Split(string $split = ''): array
        {
            if ($split === '')
                return str_split($this->content);

            return explode($split, $this->content);
        }

        public function SplitToArray(string $split = ''): Arr 
        {   
            if ($split === '')
                return new Arr(str_split($this->content));

            return new Arr($this->Split($split));
        }
    }