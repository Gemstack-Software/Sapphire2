<?php
    namespace Helpers\Files\File\Concerns;

    trait Create
    {
        public static function CreateFile(string $path): void
        {
            // Creating (recursively) folder where we should place this file
            @mkdir(static::GetFolderPathByPath($path), 0777, true);

            // Writing empty file
            static::WriteFileContent($path, '');
        }

        public function Create(): void
        {
            static::CreateFile($this->GetFullPath());
        }
    }