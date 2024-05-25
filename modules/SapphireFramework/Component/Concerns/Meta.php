<?php
    namespace Sapphire\Component\Concerns;

    trait Meta 
    {
        protected string $unique;
        protected string $hash;
        protected string $path;

        public function __construct()
        {   
            $this->SetupMeta();
        }

        public function SetPath(string $path): void 
        {
            $this->path = $path;
        }

        public function SetupMeta(): void
        {
            $this->unique = $this->ComponentUniqueId();
            $this->hash = $this->ComponentHash();
        }

        /**
         * Generating unique id
         */
        public function ComponentUniqueId(): string
        {
            return md5(uniqid(time() . '-'));
        }

        /**
         * Generate component hash based by component directory
         */
        public function ComponentHash(): string
        {
            return md5(hash('sha256', $this->thisComponentDirectoryPath));
        }

        /**
         * Getters of meta
         */
        public function GetUnique(): string 
        {
            return $this->unique;
        }
    }