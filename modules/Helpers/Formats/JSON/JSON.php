<?php
    namespace Helpers\Formats;
    use Helpers\Formats\JSON\Concerns\ToString;
    use Helpers\Formats\JSON\Concerns\ToJSON;
    use Helpers\Formats\JSON\Valid\ValidObject;
    use Helpers\Formats\JSON\Valid\ValidString;

    /**
     * @module Helpers
     * @class JSON
     * 
     * @description a class for using JSON
     */
    class JSON 
    {
        use ValidObject;
        use ValidString;
        use ToString;
        use ToJSON;
    }