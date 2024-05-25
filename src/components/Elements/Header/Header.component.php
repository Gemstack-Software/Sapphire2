<?php
    use Sapphire\Component;

    return new class extends Component 
    {
        public function View()
        {
            return $this->Template('Header.view.acid');
        }
    }; 