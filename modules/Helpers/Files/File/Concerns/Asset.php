<?php
    namespace Helpers\Files\File\Concerns;

    use Helpers\Files\Cluster;
    use Helpers\Files\File;

    trait Asset
    {
        public function Asset(string $path = ''): string
        {
            $content = $this->Read();
            $name = $this->GetFilename();
            $hash = hash('sha256', $this->GetFullPath());
            $extension = $this->Extension();

            // Dist cluster
            $cluster = Cluster::WithPath('public/~sapphire', BASE_DIR);
            $file = new File (
                "$hash.$extension", 
                parentCluster: $cluster, 
                createIfNotExists: true, 
                exceptionIfFileNotExists: false
            );

            $file->Write($content);

            // Returning asset path
            return "/~sapphire/$hash.$extension";
        }
    }