<?php
    define("gemstackSapphirev2QuartzPath", realpath(__DIR__));

    // Main service
    require(gemstackSapphirev2QuartzPath . "/Quartz/QuartzService.php");

    // Model
    require(gemstackSapphirev2QuartzPath . "/Quartz/Model/Concerns/Import.php");
    require(gemstackSapphirev2QuartzPath . "/Quartz/Model/Model.php");

    // Package provider
    require(gemstackSapphirev2QuartzPath . "/QuartzProvider.php");