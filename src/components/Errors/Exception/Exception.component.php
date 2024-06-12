<?php
    use Sapphire\Component;
    use Sapphire\Request;

    return new class extends Component
    {
        public function Setup()
        {
            $this->Store('message', $this->Store('params')["__message"]);
        }

        public function View()
        {
            return $this->Template('Exception.view.acid');
        }
    };