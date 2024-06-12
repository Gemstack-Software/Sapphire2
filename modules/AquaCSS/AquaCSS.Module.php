<?php
    define("AQUACSS_MODULE_PATH", realpath(__DIR__));

    require(AQUACSS_MODULE_PATH . '/Aqua/Aqua.php');

    require(AQUACSS_MODULE_PATH . '/Config/Concerns/Variables.php');
    require(AQUACSS_MODULE_PATH . '/Config/Config.php');

    require(AQUACSS_MODULE_PATH . '/AquaCSS/Concerns/Globals.php');
    require(AQUACSS_MODULE_PATH . '/AquaCSS/Concerns/Metrics.php');
    require(AQUACSS_MODULE_PATH . '/AquaCSS/Concerns/Compile.php');
    require(AQUACSS_MODULE_PATH . '/AquaCSS/AquaCSS.php');