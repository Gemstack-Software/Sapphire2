<?php
    namespace Sapphire\Packages\Provider\Concerns;

    trait Construct
    {
        public function __construct()
        {
            $this->_configuration = $this->ObtainPackageConfiguration();
        }
    }