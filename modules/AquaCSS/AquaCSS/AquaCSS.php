<?php
    namespace AquaCSS;

    use AquaCSS\Concerns\Compile;
    use AquaCSS\Concerns\Metrics;
    use AquaCSS\Concerns\Globals;

    class CSS
    {
        use Metrics;
        use Compile;
        use Globals;
    }