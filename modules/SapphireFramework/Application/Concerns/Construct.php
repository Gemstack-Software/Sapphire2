<?php
    namespace Sapphire\Application\Concerns;

    use Sapphire\Router;

    trait Construct
    {
        protected Router $standardRouter;
        protected Router $apiRouter;        

        public function __construct(protected array $config)
        {
            $this->AquaCSSSetup($config["aqua"]);
            $this->InjectPackages($config["packages"]);

            // Ensuring about routes
            $this->standardRouter = $config["router"];
            $this->apiRouter = $config["api"];
            $this->apiRouter->ApiRouter();

            // Ensuring about other LMPD2M apis
            $this->PreserveLMPD2MApis();

            // Selecting route to show
            $this->SelectRoute();
        }
    }