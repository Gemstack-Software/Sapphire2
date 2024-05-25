<?php
    namespace Helpers\Files\File\Concerns;

    use Helpers\Support\StringContent;

    trait Write
    {
        /**
         * This writes file content as string utf-8
         */
        public static function WriteFileContent(string $path, string $content): void
        {
            file_put_contents($path, $content);
        }

        /**
         * Writes file content from StringContent
         */
        public static function WriteFile(string $path, StringContent $fileContent): void
        {
            $fileContentString = $fileContent->GetContent();

            if (!$fileContentString)
            {
                return;
            }

            static::WriteFileContent($path, $fileContentString);
        }

        /**
         * For instances, writes file
         */
        public function Write(StringContent|string $content): void
        {
            if($content instanceof StringContent)
            {
                static::WriteFile($this->GetFullPath(), $content);
            }
            else 
            {
                static::WriteFileContent($this->GetFullPath(), $content);
            }
        }
    }