<?php
    namespace Helpers\Files\File\Concerns;
    use Helpers\Formats\JSON;
    use \include;

    trait Includes
    {
        public static function FileIncludes(string $path = '', array $parts)
        {
            foreach($parts as $key => $part)
            {
                eval("$$key = \$part;");
            }

            return include($path);
        }

        public function Includes(array $parts = [])
        {
            return static::FileIncludes(realpath($this->GetFullPath()), $parts);
        }

        public static function FileIncludeJson(string $path = '')
        {
            $content = static::ReadFile($path)->GetContent();
            
            return JSON::ToJSON($content);
        }

        public function IncludeJson()
        {
            return static::FileIncludeJson(realpath($this->GetFullPath()));
        }
    }