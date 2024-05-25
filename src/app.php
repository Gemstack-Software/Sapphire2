<?php
    use Sapphire\Application;

    $app = Application::Run ([
        'router' => \Helpers\Import('src/router/Router.php'),
        'api' => \Helpers\Import('src/router/Api.php'),
        // 'database' => \Helpers\Import('src/database/Database.php'),
        'minification' => 'ob:AllContent',
        // 'composables' => [
        //     MaterialDesign::class,
        // ],
        // 'adapters' => [
        //     BootstrapAdapter::class
        // ],
        // 'clientAdapterConfig' => [
        //     'import' => [
        //         
        //     ]
        // ]
    ]);