<?php
    namespace Helpers\Support;

    use Helpers\Support\Str\Concerns\Split;
    use Helpers\Support\Str\Concerns\Replace;
    use Helpers\Support\Str\Concerns\Minify;
    use Helpers\Support\Str\Concerns\Contains;

    class Str
    {
        use Split;
        use Replace;
        use Minify;
        use Contains;

        public function __construct(protected string|null $content = '')
        {
            if(gettype($content) === 'null')
                $this->content = '';
        }

        public function Get(): string
        {
            return $this->content;
        }

        public function Add(string $addition): void
        {
            $this->content .= $addition;
        }
    }