<?php
    namespace Helpers\Files;
    use Helpers\Files\File\Concerns\Meta;
    use Helpers\Files\File\Concerns\Read;
    use Helpers\Files\File\Concerns\Write;
    use Helpers\Files\File\Concerns\Exists;
    use Helpers\Files\File\Concerns\Extension;
    use Helpers\Files\File\Concerns\Mime;
    use Helpers\Files\File\Concerns\Includes;
    use Helpers\Files\File\Concerns\Asset;
    use Helpers\Files\File\Concerns\Create;

    class File
    {
        use Asset;
        use Create;
        use Meta;
        use Read;
        use Write;
        use Exists;
        use Extension;
        use Mime;
        use Includes;
    }