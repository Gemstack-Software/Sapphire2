<?php
    namespace Helpers\Support;
    
    use Helpers\Support\Arr\Concerns\Length;
    use Helpers\Support\Arr\Concerns\Positions;
    use Helpers\Support\Arr\Concerns\Join;

    class Arr
    {
        use Length;
        use Positions;
        use Join;

        public function __construct(protected array $base) 
        {

        }
    }