<?php
    namespace Acid\Compiler\Concerns;
    use Helpers\Files\File;
    use Helpers\Files\Storage;
    use Helpers\Files\Cluster;

    trait Builder 
    {
        public static function Build(File $input): File
        {
            ///////////////////////////////////////////
            // Obtain file meta
            ///////////////////////////////////////////
            $path = $input->GetFullPath();
            $hash = hash('sha256', $path);

            //////////////////////////////////////////
            // Obtain storage
            ///////////////////////////////////////////
            $storage = new Storage('~sapphire');
            $filedist = new Cluster('dist', $storage);
            
            ///////////////////////////////////////////
            // Create build file
            ///////////////////////////////////////////
            $output = new File($hash . '.php', $filedist);

            return static::Compile($input, $output);
        }
    }