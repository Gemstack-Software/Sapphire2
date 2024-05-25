<?php
    namespace Helpers\Files;
    use Helpers\Files\Cluster\Concerns\Meta;
    use Helpers\Files\Cluster\Concerns\Make;
    use Helpers\Files\Cluster\Concerns\Exists;
    use Helpers\Files\Cluster\Concerns\Path;
    use Helpers\Files\Cluster\Concerns\Remove;
    use Helpers\Files\Cluster\Concerns\Clear;

    class Cluster
    {
        use Meta;
        use Make;
        use Exists;
        use Path;
        use Clear;
        use Remove;
    }