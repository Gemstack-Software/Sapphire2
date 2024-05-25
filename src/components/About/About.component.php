<?php
    use Sapphire\Component;
    use Sapphire\Controller;

    return new class extends Component 
    {
        public function Setup()
        {
            $this->Store('posts', (Controller::Import('src.controllers.Post'))->Index());
        }

        public function View()
        {
            return $this->Template('About.view.acid');
        }
    }; 