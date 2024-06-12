<?php
    namespace AquaCSS\Config\Concerns;

    use AquaCSS\Config;

    trait Variables
    {
        /**
         * Adds global variable to config
         */
        public function AddVariable(string $varName, string $cssValue): Config
        {
            $this->globalVariables[$varName] = $cssValue;

            return $this;
        }

        /**
         * Gets global variable's value
         */
        public function GetVariableValue(string $varName)
        {
            return $this->globalVariables[$varName];
        }
    }