<?php
    namespace Helpers\Files\File\Concerns;

    trait Mime
    {
        public static function FileMime(string $path = ''): string|null
        {
            if (!$path)
            {
                return null;
            }
            if ($path === '')
            {
                return null;
            }

            $extension = static::FileExtension($path);

            switch ($extension)
            {
                case 'css':
                    return 'text/css';
                case 'js':
                case 'mjs':
                    return 'text/javascript';
                case 'jpg':
                case 'jpeg':
                    return 'image/jpeg';
                case 'gif':
                    return 'image/gif';
                case 'htm':
                case 'html':
                    return 'text/html';
                case 'gz':
                    return 'application/gzip';
                case 'csv':
                    return 'text/csv';
                case 'bmp':
                    return 'image/bmp';
                case 'avif':
                    return 'image/avif';
                case 'apng':
                    return 'image/apng';
                case 'aac':
                    return 'audio/aac';
                case 'ico':
                    return 'image/vnd.microsoft.icon';
                case 'json':
                    return 'application/json';
                case 'mp3':
                    return 'audio/mpeg';
                case 'mp4':
                    return 'video/mp4';
                case 'mpeg':
                    return 'video/mpeg';
                case 'png':
                    return 'image/png';
                case 'pdf':
                    return 'application/pdf';
                case 'php':
                    return 'application/x-httpd-php';
                case 'rar':
                    return 'application/vnd.rar';
                case 'svg':
                    return 'image/svg+xml';
                case 'tar':
                    return 'application/x-tar';
                case 'ts':
                    return 'video/mp2t';
                case 'ttf':
                    return 'font/ttf';
                case 'txt':
                    return 'text/plain';
                case 'wav':
                    return 'audio/wav';
                case 'webp':
                    return 'image/webp';
                case 'woff2':
                    return 'font/woff2';
                case 'zip':
                    return 'application/zip';
            }

            return null;
        }

        public function Mime(): string|null
        {
            return static::FileMime($this->GetFullPath());
        }
    }