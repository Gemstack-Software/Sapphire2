<?php
    namespace Sapphire\Packages\Provider\Concerns;

    trait Meta
    {
        /**
         * Contains name of config file (from src/configs/Providers)
         */
        public string $configName;

        /**
         * Contains the configuration
         */
        private array $_configuration;
    }