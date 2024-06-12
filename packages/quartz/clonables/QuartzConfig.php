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
            'userdatas' => [
                'type' => 'mysql',
                'credentials' => [
                    'username' => 'root',
                    'password' => '',
                    'database' => 'example-userdatas',
                    'hostname' => 'localhost' 
                ]
            ]
        ]
    ]);