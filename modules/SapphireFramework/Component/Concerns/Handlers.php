<?php
    namespace Sapphire\Component\Concerns;
    use Sapphire\Request;
    use Helpers\Support\Str;

    trait Handlers 
    {
        /**
         * Handle Crystalliser action before rendering
         */
        public function HandleAPIChangesBeforeRender(): bool
        {
            $use = Request::Current()->GetContent()->use;

            // No content in callback so we do nothing
            if($use === '') 
            {
                return false;
            }

            // Getting prefix
            switch($use[0])
            {
                case '.':
                    $this->HandleSingleActionCallback($use);
                break;
            }

            return true;
        }

        /**
         * Execute crystalliser callback action
         */
        public function HandleSingleActionCallback($action): void
        {
            $data = $this->HandlePassedData();

            $str = new Str($action);
            $actionCallback = $str->Split('.')[1];

            // Execute desired action from current instance
            if(in_array($actionCallback, get_class_methods($this)))
            {
                call_user_func_array([$this, $actionCallback], $data);
            }
        }

        /**
         * Putting properties into component
         */
        public function HandleAPIPropsChanges(): void
        {
            $this->StoreOverride (
                Request::Current()->GetContent()->props
            );
        }

        /**
         * Handles data passed by model
         */
        public function HandlePassedData(): array 
        {
            $request = Request::Current();
            $event = @$request->GetContent()->event;

            if (!$event)
            {
                return [];
            }

            return [$event];
        }
    }