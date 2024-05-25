<?php
    namespace Helpers\Support\Arr\Concerns;

    trait Join
    {
        public function Join(string $glue = ''): string
        {
            $joinedString = '';

            foreach($this->base as $item)
            {
                $joinedString .= $item;
                $joinedString .= $glue;
            }

            return $joinedString;
        }
    }