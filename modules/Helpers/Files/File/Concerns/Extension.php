<?php
    namespace Helpers\Files\File\Concerns;

    trait Extension
    {
        public static function FileExtension(string $path = ''): string
        {
            if (!$path)
            {
                return '';
            }
            if ($path === '')
            {
                return '';
            }

            return strtolower(pathinfo($path, PATHINFO_EXTENSION));
        }

        public function Extension(): string
        {
            return static::FileExtension($this->GetFullPath());
        }
    }