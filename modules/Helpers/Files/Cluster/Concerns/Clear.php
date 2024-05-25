<?php
    namespace Helpers\Files\Cluster\Concerns;

    use \RecursiveDirectoryIterator;
    use \RecursiveIteratorIterator;
    use \FilesystemIterator;

    trait Clear
    {
        public function Clear(): void
        {
            if (!$this->Exists())
                return;

            $path = $this->GetPath();

            $dir = new RecursiveDirectoryIterator ($path, FilesystemIterator::SKIP_DOTS); 
            $dir = new RecursiveIteratorIterator  ($dir, RecursiveIteratorIterator::CHILD_FIRST); 

            foreach ($dir as $file)
            {
                if ($file->isDir())
                {
                    rmdir($file);
                }
                else
                {
                    unlink($file);
                }
            }
        }
    }