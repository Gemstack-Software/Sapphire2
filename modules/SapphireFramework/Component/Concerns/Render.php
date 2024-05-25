<?php
    namespace Sapphire\Component\Concerns;

    trait Render 
    {
        public function Render(array $params, bool $setup = true): bool
        {
            $this->Store('params', $params);
            
            /////////////////
            // Settuping
            /////////////////
            if($setup) 
            {
                $this->Setup();
            }

            ////////////////////////////////////////
            // Checking if required to do sth
            ////////////////////////////////////////
            if(@$params["__fromApiRender"])
            {
                $this->HandleAPIPropsChanges();
                $this->HandleAPIChangesBeforeRender();
            }

            if($this->View()) 
            {
                return true;
            }

            return false;
        }
    }