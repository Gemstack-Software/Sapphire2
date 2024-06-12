<?php
    namespace AquaCSS;

    use AquaCSS\Config\Concerns\Variables;

    /**
     * Configuration of AquaCSS global styles
     */

    class Config
    {
        use Variables;

        /**
         * List of all variables that are global scoped
         * each of this variable could be used by global(string Varname) in .aqua
         */
        protected array $globalVariables = [];

        /**
         * List of all default fillins that fills the elements without classess
         */
        protected array $defaultFillins = [];
    }