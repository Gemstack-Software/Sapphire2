<?php
    namespace Sapphire\Application\Concerns;
    use Sapphire\Application;

    /**
     * This is LMPD2M - the secret ingridient of Sapphire.
     * 
     * It was made to handle Sapphire devAPI - to make Adapter and Crystaller works etc...
     */
    trait LMPD2M
    {
        public function PreserveLMPD2MApis(): void
        {
            $this->apiRouter->AddRoutesToList([
                "lmpd2m" => [
                    'render' => 'modules/InternalAPIComponents/Render/Render.component.php',
                    'adapter' => 'modules/InternalAPIComponents/Adapter/Adapter.component.php'
                ]
            ]);
        }        
    }