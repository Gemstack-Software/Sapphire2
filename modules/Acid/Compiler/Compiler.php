<?php
    namespace Acid;
    use Acid\Compiler\Concerns\Builder;
    use Acid\Compiler\Concerns\Compile;
    use Acid\Compiler\Concerns\Acid4ElementUuid;
    use Acid\Compiler\Concerns\Style;

    /**
     * ==========================================
     *             ACID COMPILER
     * ==========================================
     * 
     * This class is made to compile .acid files
     * into .php files that can be used as ui
     * 
     */

    class Compiler 
    {
        use Acid4ElementUuid;
        use Builder;
        use Compile;
        use Style;
    }