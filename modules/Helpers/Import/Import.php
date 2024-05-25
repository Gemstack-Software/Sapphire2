<?php
    namespace Helpers;
    use Helpers\Files\File;

    function Import(string $path)
    {
        return (new File(BASE_DIR . '/' . $path))->Includes();
    }