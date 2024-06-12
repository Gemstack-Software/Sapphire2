<?php
    use Sapphire\Application;
    use Sapphire\Composable;

    $app;
    $app = Application::Run ([
        'router' => \Helpers\Import('src/router/Router.php'),
        'api' => \Helpers\Import('src/router/Api.php'),
        'minification' => 'ob:AllContent',
        'aqua' => [
            'config' => Composable::FromGlobal('src.configs.Css')
        ],
        'packages' => [
            [
                'package' => 'packages.quartz.QuartzPackage',
                'provider' => 'packages.quartz.QuartzProvider'
            ]
        ]
    ]);