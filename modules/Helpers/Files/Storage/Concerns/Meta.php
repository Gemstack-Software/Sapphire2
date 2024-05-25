<?php
    namespace Helpers\Files\Storage\Concerns;

    use Helpers\Files\Cluster;
    use Helpers\Exceptions\MissingArgumentException;

    trait Meta
    {

        public function __construct(protected string $name)
        {
            $storagesCluster = Cluster::WithPath('storage', static::$STORAGES_PATH);

            parent::__construct($name, $storagesCluster);
        }
        
        /**
         * Set storage name
         */
        public function SetName(string $name): void
        {
            $this->name = $name;
        }

        /**
         * Get storage name
         */
        public function GetName(): string
        {
            return $this->name;
        }
    }