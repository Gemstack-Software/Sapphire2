<?php
    namespace Helpers\Files\File\Concerns;

    use Helpers\Files\Cluster;
    use Helpers\Exceptions\MissingArgumentException;
    use Helpers\Exceptions\FileNotFoundException;

    trait Meta
    {
        public function __construct(protected string $path, protected Cluster|null $parentCluster = null, private bool $createIfNotExists = true, private bool $exceptionIfFileNotExists = true)
        {
            if ($path === '')
            {
                throw new MissingArgumentException("Constructing \Helpers\Files\File requires providing the following arguments: (<string \$path>)");
            }
            
            if(!$this->Exists())
            {
                if($createIfNotExists)
                {
                    $this->Write('');
                }
                else
                {
                    if($exceptionIfFileNotExists)
                    {
                        throw new FileNotFoundException("File located as: $path has not been found!");
                    }
                }
            }
        }
        
        /**
         * Set file path
         */
        public function SetPath(string $path): void
        {
            $this->path = $path;
        }

        /**
         * Get file path (or name)
         */
        public function GetPath(): string
        {
            return $this->path;
        }

        /**
         * Get file full path
         */
        public function GetFullPath(): string
        {
            if ($this->parentCluster)
            {
                $parentClusterPath = $this->parentCluster->GetPath();

                return "$parentClusterPath/$this->path";
            }

            return $this->path;
        }
    }