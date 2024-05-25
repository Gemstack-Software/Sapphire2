<?php
    namespace Sapphire;

    use Sapphire\Router\Concerns\RouterList;
    use Sapphire\Router\Concerns\ApiRouter;
    use Sapphire\Router\Concerns\Route;

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

        public function __construct (protected string $prefix, protected array $list)
        {
        }
    }