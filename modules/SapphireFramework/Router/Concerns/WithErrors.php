<?php
    namespace Sapphire\Router\Concerns;

    trait WithErrors 
    {
        /**
         * Error components paths
         */
        protected string|null $e_404 = null;
        protected string|null $e_403 = null;
        protected string|null $e_500 = null;

        /**
         * Exceptions paths
         */
        protected array $exceptions = [];

        /**
         * Set errors pages
         */
        public function WithErrors (
            string|null $_404 = null,
            string|null $_403 = null,
            string|null $_500 = null,
            array $exceptions = []
        )
        {
            $this->e_404 = $_404 ?? $this->e_404;
            $this->e_403 = $_403 ?? $this->e_403;
            $this->e_500 = $_500 ?? $this->e_500;
            $this->exceptions = $exceptions ?? $this->exceptions;

            if(defined("SAPPHIRE_ROUTER_EXCEPTIONS")) 
            {
                uopz_undefine("SAPPHIRE_ROUTER_EXCEPTIONS");
            }
            define("SAPPHIRE_ROUTER_EXCEPTIONS", $this->exceptions);

            return $this;
        }
    }