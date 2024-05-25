<?php
    namespace Sapphire;

    use Sapphire\Renderer\Concerns\Classical;
    use Sapphire\Renderer\Concerns\Adapter;

    /**
     * ===================================================
     *  SAPPHIRE RENDERER
     * ===================================================
     * 
     * This class renders Sapphire's content
     */
    
    class Renderer
    {
        use Classical;
        use Adapter;
    }