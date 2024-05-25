<?php
    namespace Helpers\Support\Str\Concerns;
    use Helpers\Support\Str;

    trait Replace
    {
        public function Replace(string $old, string $new): Str
        {
            return new Str(str_replace($old, $new, $this->content));
        }

        public function ReplaceLeaving(string $old, string $new): void
        {
            $this->content = str_replace($old, $new, $this->content);
        }

        public function ReplaceRegexWithCallbackLeaving($regex, $callback): void
        {
            $this->content = preg_replace_callback($regex, $callback, $this->content);
        }
    }