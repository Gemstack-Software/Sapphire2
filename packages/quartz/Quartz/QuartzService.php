<?php   
    namespace Quartz;

    class QuartzService 
    {
        /**
         * Contains all databases that Quartz has connected (from configuration)
         */
        protected array $databases;

        /**
         * Constructing
         */
        public function __construct(protected array $configuration = [])
        {}
    }