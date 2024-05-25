<?php
    namespace Sapphire;
    use Sapphire\Application\Concerns\Run;
    use Sapphire\Application\Concerns\SelectRoute;
    use Sapphire\Application\Concerns\LMPD2M;
    use Sapphire\Router;
    use Amethyst\Connection as AmethystConnection;

    /**
     * ===================================================
     *  SAPPHIRE APPLICATION
     * ===================================================
     * 
     * This provides class for managing whole sapphire application
     */

    class Application 
    {
        use Run;
        use SelectRoute;
        use LMPD2M;

        protected Router $standardRouter;
        protected Router $apiRouter;
        protected AmethystConnection $amethyst;

        public function __construct(protected array $config)
        {
            $this->standardRouter = $config["router"];
            $this->apiRouter = $config["api"];
            $this->apiRouter->ApiRouter();

            $this->PreserveLMPD2MApis();
            $this->SelectRoute();
        }
    }