<?php
    namespace Amethyst;
    use Amethyst\Connection;

    /**
     * Function to create connection to Amethyst
     */
    function Database(string $credential = '', string $url = '') {
        return new Connection($credential, $url);
    }