<?php
    namespace Sapphire\Packages;

    use Sapphire\Packages\Provider\Concerns\Construct;
    use Sapphire\Packages\Provider\Concerns\Configuration;
    use Sapphire\Packages\Provider\Concerns\Meta;

    class PackageProvider 
    {
        use Construct;
        use Configuration;
        use Meta;
    }