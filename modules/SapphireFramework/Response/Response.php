<?php
    namespace Sapphire;

    use Sapphire\Response\Concerns\HTML;
    use Sapphire\Response\Concerns\ResponseExit;
    use Sapphire\Response\Concerns\Status;
    use Sapphire\Response\Concerns\Header;

    /**
     * ===================================================
     *  SAPPHIRE RESPONSE
     * ===================================================
     * 
     * This class contains all important methods for responsing
     */
    
    class Response
    {
        use HTML;
        use Header;
        use ResponseExit;
        use Status;
    }