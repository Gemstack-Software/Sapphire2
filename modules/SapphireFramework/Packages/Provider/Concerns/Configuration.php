<?php
    namespace Sapphire\Packages\Provider\Concerns;

    use Helpers\Support\Path;
    use Helpers\Files\File;
    use Helpers\Formats\JSON;

    trait Configuration
    {
        /**
         * Obtains config of provider or if it does not exists, creates it.
         */
        public function ObtainPackageConfiguration(): array
        {
            if($path = Path::PackageFormatToRealPath('src.configs.Packages', '/' . $this->configName, true))
            {
                $file = new File($path, createIfNotExists: false, exceptionIfFileNotExists: false);

                if($file->Exists())
                {
                    // Config exists
                    return $file->Includes();
                }
                else 
                {
                    // Config does not exists, need to clone
                    $file->Create();
                    $file->Write((new File($this->SetupConfigurtaion()))->Read());

                    return $this->ObtainPackageConfiguration();
                }
            }

            return [];            
        }
    }