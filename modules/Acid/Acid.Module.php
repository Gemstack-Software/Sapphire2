<?php
    define("ACID_MODULE_PATH", realpath(__DIR__));

    require(ACID_MODULE_PATH . '/Compiler/Concerns/Builder.php');
    require(ACID_MODULE_PATH . '/Compiler/Concerns/Compile.php');
    require(ACID_MODULE_PATH . '/Compiler/Concerns/Acid4ElementUuid.php');
    require(ACID_MODULE_PATH . '/Compiler/Concerns/Style.php');
    require(ACID_MODULE_PATH . '/Compiler/Compiler.php');