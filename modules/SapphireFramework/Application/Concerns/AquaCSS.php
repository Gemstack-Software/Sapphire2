<?php
    namespace Sapphire\Application\Concerns;

    use AquaCSS\Config;

    trait AquaCSS
    {
        public Config $aquaCSSConfig;

        /**
         * Settuping up AquaCSS in App
         */
        public function AquaCSSSetup($aqua): void
        {
            global $__aquaCSSConfig;
                        
            $__aquaCSSConfig = $this->aquaCSSConfig = $aqua["config"];   
        }   
    }