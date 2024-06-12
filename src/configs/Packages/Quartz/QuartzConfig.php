<?php
    /**
     * =========================================================================
     *  Quartz Databases Provider
     * 
     *  Configuration File
     * ==========================================================================
     */

    return ([
        'databases' => [
            'dbContents' => [
                'type' => 'mysql',
                'credentials' => [
                    'username' => 'root',
                    'password' => '',
                    'database' => 'example-contents',
                    'hostname' => 'localhost' 
                ]
            ]
        ]
    ]);