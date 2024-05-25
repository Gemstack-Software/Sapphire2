<?php
    namespace Helpers\Files;
    use Helpers\Files\Storage\Concerns\Meta;
    use Helpers\Files\Cluster;

    class Storage extends Cluster
    {
        use Meta;

        public static $STORAGES_PATH = BASE_DIR;
    }