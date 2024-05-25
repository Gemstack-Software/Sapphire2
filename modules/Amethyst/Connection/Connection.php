<?php
    namespace Amethyst;
    use Helpers\Files\File;
    use Amethyst\Connection\Concerns\Auth;
    use Amethyst\Connection\Concerns\Cluster;
    use Amethyst\Exceptions\AmethystDatabaseCannotConnectException;

    $amethystDatabaseConnection;

    class Connection 
    {
        use Auth;
        use Cluster;

        public $connectionConfig;

        public function __construct(protected string $credential, protected string $url)
        {
            ////////////////////////////////////
            // Amethyst Path
            ////////////////////////////////////
            $path = BASE_DIR . $url . '/database_config._lock.json';

            ////////////////////////////////////
            // Obtaining database config
            ////////////////////////////////////
            $this->connectionConfig = (new File($path))->IncludeJson();

            ////////////////////////////////////
            // Check if connection is stable
            ////////////////////////////////////
            if(!$this->Authorized())
            {
                throw new AmethystDatabaseCannotConnectException;
            }

            $amethystDatabaseConnection = $this;
        }
    }