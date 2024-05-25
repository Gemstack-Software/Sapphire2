<?php
    namespace Helpers\Support\StringContent\Concerns;

    trait Content
    {
        public function GetContent(): string
        {
            return $this->content;
        }

        public function SetContent(string $content): void
        {
            $this->content = $content;
        }

        public function AddContent(string $content): void
        {
            $this->content .= $content;
        }

        public function AddContentToNextLine(string $content): void 
        {
            $this->content .= PHP_EOL;
            $this->content .= $content;
        }

        public function AddEOL(): void 
        {
            $this->content .= PHP_EOL;
        }
    }