<?php
    use Sapphire\Component;
    use AquaCSS\Aqua;

    return new class extends Component
    {
        public function Setup()
        {
            $this->Store('style:fontSize', 100);
        }

        public function Increment()
        {
            $this->Store('style:fontSize', $this->Store('style:fontSize') + 20);
        }

        public function View()
        {
            $this->Styles (
                new Aqua("src.components.App")
            );

            return $this->Template('App.acid');
        }
    };