<?php
    namespace Helpers\Files\Cluster\Concerns;

    use Helpers\Files\Cluster;
    use Helpers\Exceptions\MissingArgumentException;

    trait Meta
    {
        public function __construct(protected string $name, protected Cluster|string $parentCluster)
        {
            if ($name === '' || !$parentCluster)
            {
                throw new MissingArgumentException("Constructing \Helpers\Files\Cluster or derivatives requires providing the following arguments: (<string \$name>, <Cluster \$parentCluster>)");
            }

            $this->MakeIfNotExists();
        }

        public static function WithPath(string $name, string $parentPath)
        {
            return new Cluster($name, $parentPath);
        }
        
        /**
         * Set cluster name
         */
        public function SetName(string $name): void
        {
            $this->name = $name;
        }

        /**
         * Get cluster name
         */
        public function GetName(): string
        {
            return $this->name;
        }

        /**
         * Set cluster parent path
         */
        public function SetParentCluster(Cluster|string $cluster): void
        {
            $this->parentCluster = $cluster;
        }

        /**
         * Get cluster parent path
         */
        public function GetParentCluster(): Cluster|string
        {
            return $this->parentCluster;
        }
    }