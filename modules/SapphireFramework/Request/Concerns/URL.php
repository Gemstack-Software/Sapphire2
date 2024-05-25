<?php
    namespace Sapphire\Request\Concerns;
    use Sapphire\Request;
    use Helpers\Support\Str;

    trait URL 
    {
        public function GetURLWithoutPath(): string 
        {
            $protocol = $_SERVER['PROTOCOL'] = isset($_SERVER['HTTPS']) && !empty($_SERVER['HTTPS']) ? 'https' : 'http';

            return $protocol . '://' . $_SERVER['HTTP_HOST'];
        }

        public function GetURL(): string 
        {
            return $_SERVER['REQUEST_URI'];
        }

        public function GetURLParts(): array 
        {
            $str = new Str($this->GetURL());

            return $str->Split('/');
        }

        public function IsApiURL(): bool {
            $parts = $this->GetURLParts();

            return $parts[1] === 'api';
        }
    }