<?php
    use Sapphire\Component;

    return new class extends Component 
    {
        public function Setup()
        {
            $this->Store('Name', 'Maciej');
        }

        public function ChangeValue($event)
        {   
            $this->Store('Name', $event->targetProperties->value);
        }

        public function View()
        {  
            return $this->Template('App.view.acid');
        }
    };