<?php
    use Sapphire\Router;
    
    return Router::List ([
        'app' => 'src/components/App/App.component.php',
        'news' => 'src/components/News/News.component.php'
    ])->WithErrors (
        _404: 'src/components/Errors/404/404.component.php',
        exceptions: [
            '*' => 'src/components/Errors/Exception/Exception.component.php'
        ]
    );