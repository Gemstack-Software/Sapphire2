<?php
    namespace Sapphire;

    use Sapphire\Request\Concerns\Current;
    use Sapphire\Request\Concerns\Fetch;
    use Sapphire\Request\Concerns\Client;
    use Sapphire\Request\Concerns\URL;

    /**
     * ===================================================
     *  SAPPHIRE REQUEST
     * ===================================================
     * 
     * This class contains all important methods for requests
     */

    class Request
    {
        use Current;
        use Fetch;
        use Client;
        use URL;

        public function GetContent(): \stdClass | null 
        {
            return json_decode(file_get_contents('php://input'));
        }
    }