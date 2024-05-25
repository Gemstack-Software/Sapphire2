<?php
    namespace Helpers\Files\File\Concerns;

    trait Exists
    {
        public static function FileExists(string $path = ''): bool
        {
            if (!$path)
            {
                return false;
            }
            if ($path === '')
            {
                return false;
            }

            return file_exists($path);
        }

        public function Exists(): bool
        {
            return static::FileExists($this->GetFullPath());
        }
    }