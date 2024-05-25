<?php
    /**
     * ============================================
     *  Combined Sapphire v.2 Module
     * ============================================
     * 
     * This is a file that includes all modules required for Sapphire 2 to work
     */

    if (BASE_DIR) 
    {
        require(BASE_DIR . '/modules/Helpers/Helpers.Module.php');
        require(BASE_DIR . '/modules/Acid/Acid.Module.php');
        require(BASE_DIR . '/modules/SapphireFramework/SapphireFramework.Module.php');
        require(BASE_DIR . '/modules/Amethyst/Amethyst.Module.php');
    } 
    else 
    {
        echo "[modules/Combined/CombinedSapphire2Module.php]: Constant [BASE_DIR] is not defined!";
    }