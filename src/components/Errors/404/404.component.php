<?php
    use Sapphire\Component;
    use Sapphire\Request;

    return new class extends Component
    {
        public function Setup()
        {
            $this->Store('url', Request::Current()->GetURL());
        }

        public function View()
        {
            return $this->Template('404.view.acid');
        }
    };