<?php
    namespace Sapphire;
    use Sapphire\Application\Concerns\Run;
    use Sapphire\Application\Concerns\SelectRoute;
    use Sapphire\Application\Concerns\LMPD2M;
    use Sapphire\Application\Concerns\Packages;
    use Sapphire\Application\Concerns\AquaCSS;
    use Sapphire\Application\Concerns\Construct;

    /**
     * ===================================================
     *  GLOBAL VARIABLES REQUIRED FOR SAPPHIRE TO WORK
     * ===================================================
     */
    $__aquaCSSConfig = [];

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
        use Packages;
        use AquaCSS;
        use Construct;
    }