<?php
    namespace Helpers\Support\Arr\Concerns;

    use Helpers\Support\Arr;

    trait Positions
    {
        public function Last()
        {
            return $this->base [$this->Length() - 1];
        }

        public function First()
        {
            return $this->base [0];
        }

        public function AllWithout($index)
        {
            $newArray = [];

            foreach ($this->base as $key => $item)
            {
                if ($key === $index) continue;

                $newArray[] = $item;
            }

            return new Arr($newArray);
        }
    }