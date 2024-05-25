<?php
    namespace Helpers\Files\File\Concerns;

    use Helpers\Support\StringContent;

    trait Read
    {
        /**
         * This reads file content as string utf-8
         */
        public static function ReadFileContent(string $path): string|null
        {
            if (!static::FileExists($path))
            {
                return null;
            }

            return file_get_contents($path);
        }

        /**
         * Read file as StringContent
         */
        public static function ReadFile(string $path): StringContent|null
        {
            $fileContent = static::ReadFileContent($path);

            if (!$fileContent)
            {
                return null;
            }

            return new StringContent($fileContent);
        }

        /**
         * For instances, reading file
         */
        public function Read(): StringContent|null
        {
            return static::ReadFile($this->GetFullPath());
        }
    }