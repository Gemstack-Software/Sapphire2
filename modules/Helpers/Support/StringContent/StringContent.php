<?php
    namespace Helpers\Support;
    use Helpers\Support\StringContent\Concerns\Content;

    class StringContent
    {
        use Content;

        public function __construct(protected string $content)
        {

        }
    }