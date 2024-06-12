<?php
    namespace Sapphire;

    use Sapphire\Router\Concerns\RouterList;
    use Sapphire\Router\Concerns\ApiRouter;
    use Sapphire\Router\Concerns\Route;
    use Sapphire\Router\Concerns\WithErrors;

    /**
     * ===================================================
     *  SAPPHIRE ROUTER
     * ===================================================
     * 
     * This provides class for making router in Sapphire
     */

    class Router
    {
        use RouterList;
        use ApiRouter;
        use Route;
        use WithErrors;

        public function __construct (protected string $prefix, protected array $list)
        {
        }
    }