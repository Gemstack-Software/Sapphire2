<?php
    namespace Sapphire\Component\Concerns;
    use AquaCSS\Aqua;

    trait Styles 
    {
        protected bool $usedStyles = false;
        protected array $aquasStyles = [];
        protected array $cssesStyles = [];

        public function Styles(...$allStyles)
        {
            $this->usedStyles = true;

            foreach($allStyles as $style)
            {
                if($style instanceof Aqua)
                {
                    $this->aquasStyles[] = $style;
                }
                else
                {
                    $this->cssesStyles[] = $style;
                }
            }
        }
    }
