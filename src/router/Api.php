<?php
    use Sapphire\Router;
    use Helpers\Import;

    return Router::List ([
        'user' => [
            '/' => [ 'src/controllers/User/User.controller.php', 'Index' ]
        ],
        'post' => [
            '/' => [ 'src/controllers/Post/Post.controller.php', 'Index' ]
        ]
    ]);