<?php
    use Sapphire\Component;
    use Helpers\Support\Str;

    return new class extends Component 
    {
        public function Setup()
        {
            $this->Store('Gender', 'Male');
            $this->Store('Fixed', false);

            // Name and sex
            $name = new Str($this->Param('name'));
            
            if($name->SplitToArray()->Last() === 'a')
            {
                $this->Store('Gender', 'Female');
            }
        }

        public function ReportMistake()
        {   
            if($this->Store('Fixed')) return;

            if($this->Store('Gender') === 'Male')
            {
                $this->Store('Gender', 'Female');
            }
            else
            {
                $this->Store('Gender', 'Male');
            }

            $this->Store('Fixed', true);
        }

        public function View()
        {
            return $this->Template('Gender.view.acid');
        }
    };