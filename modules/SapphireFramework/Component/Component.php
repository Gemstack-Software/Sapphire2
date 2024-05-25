<?php
    namespace Sapphire;

    use Sapphire\Component\Concerns\View;
    use Sapphire\Component\Concerns\Render;
    use Sapphire\Component\Concerns\Template;
    use Sapphire\Component\Concerns\Store;
    use Sapphire\Component\Concerns\Setup;
    use Sapphire\Component\Concerns\Meta;
    use Sapphire\Component\Concerns\Handlers;
    use Sapphire\Component\Concerns\Param;
    use Sapphire\Component\Concerns\ChildComponent;

    /**
     * ===================================================
     *  SAPPHIRE COMPONENT
     * ===================================================
     * 
     * This provides class for making template of component in Sapphire
     */

    class Component 
    {
        use View;
        use Render;
        use Template;
        use Store;
        use Setup;
        use Meta;
        use Handlers;
        use Param;
        use ChildComponent;

        public string $thisComponentDirectoryPath = BASE_DIR;
    }