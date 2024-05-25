<?php
    use Sapphire\Component;
    use Sapphire\Controller;

    return new class extends Component 
    {
        public function View()
        {
            return $this->Template('Request.view.acid');
        }
    }; 