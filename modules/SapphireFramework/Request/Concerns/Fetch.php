<?php
    namespace Sapphire\Request\Concerns;
    use Sapphire\Request;
    use Helpers\Support\Str;
    use Helpers\Formats\JSON;
    use Helpers\Files\Storage;
    use Helpers\Files\Cluster;
    use Helpers\Files\File;

    trait Fetch 
    {
        public static function FormatURL(string $url): string 
        {
            if(stristr($url, "://"))
            {
                return $url;
            }

            return (new Request())->GetURLWithoutPath() . $url;
        }

        /**
         * Fetching URL
         */
        public static function Fetch(string $method, string $url) 
        {
            $url = static::FormatURL($url);
            $method = strtolower($method);

            if($method === "get")
            {
                return file_get_contents($url);
            }

            return "Unknown";
        }

        /**
         * ==============================================
         *                  CACHE
         * ==============================================
         * 
         * TODO: Cache time limiter!
         */

        public static function GetCachedFileName(string $method, string $url): string
        {
            $ip = Request::GetClientIP();

            ///////////////////////////////
            // Making URL hash
            ///////////////////////////////
            $total = "$ip-$url";
            $totalHash = hash('sha256', $total);
            return $method . '-' . $totalHash . '.cache';
        }

        public static function IsCached(string $method, string $url) 
        {
            $fileName = static::GetCachedFileName($method, $url);

            ///////////////////////////////
            // Check if cache is
            ///////////////////////////////
            $sapphire = new Storage("~sapphire");
            $cache = new Cluster("request_cache", $sapphire);
            $file = new File($fileName, $cache, createIfNotExists: false, exceptionIfFileNotExists: false);

            return $file->Exists();
        }

        public static function GetCached(string $method, string $url) 
        {
            $fileName = static::GetCachedFileName($method, $url);

            ///////////////////////////////
            // Check if cache is
            ///////////////////////////////
            $sapphire = new Storage("~sapphire");
            $cache = new Cluster("request_cache", $sapphire);
            $file = new File($fileName, $cache, createIfNotExists: false, exceptionIfFileNotExists: false);

            return $file->Read()->GetContent();
        }

        public static function CacheResponse(string $method, string $url, string $content): void
        {
            $fileName = static::GetCachedFileName($method, $url);

            ///////////////////////////////
            // Check if cache is
            ///////////////////////////////
            $sapphire = new Storage("~sapphire");
            $cache = new Cluster("request_cache", $sapphire);
            $file = new File($fileName, $cache, createIfNotExists: true, exceptionIfFileNotExists: false);

            $file->Write($content);
        }

        /**
         * Fetch cached
         */
        public static function FetchCached(string $method, string $url)
        {
            if(static::IsCached($method, $url))
            {
                return static::GetCached($method, $url);
            }

            $response = static::Fetch($method, $url);

            static::CacheResponse($method, $url, $response);
            
            return $response;
        }
    }