<?php
    namespace Sapphire\Application\Concerns;

    use Sapphire\Application;
    use Helpers\Support\Path;
    use Helpers\Files\File;

    trait Packages
    {
        /**
         * Array contains all working packages in current Sapphire instance
         */
        protected array $workingPackages;

        /**
         * Injecting new packages into sapphire
         */
        protected function InjectPackages(array $packages): void
        {   
            $this->workingPackages ??= [];

            foreach($packages as $package)
            {
                $_package = $package["package"]; // Contains autoload
                $_provider = $package["provider"]; // Contains provider

                // Injecting package
                $this->InjectPackage ($_package, $_provider);
            }
        }   

        /**
         * Injecting single package into sapphire
         */
        private function InjectPackage(string $packageAutoloadFile, string $packageProviderFile): void
        {
            $autoloadPath = Path::PackageFormatToRealPath($packageAutoloadFile, '.php', true);
            $providerPath = Path::PackageFormatToRealPath($packageProviderFile, '.php', true);

            // Importing autoload
            (new File($autoloadPath))->Includes();
            
            // Including the provider
            $provider = (new File($providerPath))->Includes();
            $provider;
        }
    }