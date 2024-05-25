<?php
    define("AMETHYST_MODULE_PATH", realpath(__DIR__));

    require(AMETHYST_MODULE_PATH . '/Exceptions/AmethystDatabaseCannotConnectException.php');

    require(AMETHYST_MODULE_PATH . '/Database/Database.php');
    
    require(AMETHYST_MODULE_PATH . '/Connection/Concerns/Auth.php');
    require(AMETHYST_MODULE_PATH . '/Connection/Concerns/Cluster.php');
    require(AMETHYST_MODULE_PATH . '/Connection/Connection.php');