<?php
    namespace Quartz;
    use Quartz\QuartzService;

    return new class extends \Sapphire\Packages\PackageProvider
    {
        // Inside of src.configs path
        public string $configName = "Quartz/QuartzConfig.php";

        // Returns path of clonable config
        public function SetupConfigurtaion(): string
        {
            return __DIR__ . '/clonables/QuartzConfig.php';
        }

        public function Get()
        {
            return new QuartzService($this->GetConfig());
        }
    };