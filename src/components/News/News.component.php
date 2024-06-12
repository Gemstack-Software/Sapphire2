<?php
    use Sapphire\Component;
    use Sapphire\Controller;
    use AquaCSS\Aqua;
    
    return new class extends Component
    {
        public function Setup()
        {
            $this->Store('news', (Controller::Import('src.controllers.Post'))->Index());
        }

        public function View()
        {
            $this->Styles (
                new Aqua("src.components.News")
            );

            return $this->Template('News.acid');
        }
    };