<?php
    namespace Sapphire\Component\Concerns;
    use Helpers\Files\File;
    use Helpers\Formats\JSON;
    use \stdClass;

    trait Store 
    {
        private array $componentStateStorage = [];

        /**
         * Store or get store value
         */
        public function Store(string $name, $value = null)
        {
            if($value !== null)
            {
                $this->componentStateStorage[$name] = $value;    
            }

            return $this->DropStore()[$name];
        }

        /**
         * Return whole storage
         */
        public function DropStore(): array
        {
            return $this->componentStateStorage;
        }

        /**
         * Overrides store objects
         */
        public function StoreOverride(stdClass $overrides): void 
        {
            $this->componentStateStorage = get_object_vars($overrides);

            if(is_array($this->componentStateStorage))
            {
                /**
                 * Storage is array
                 */
                if($this->componentStateStorage["params"])
                {
                    $this->componentStateStorage["params"] = get_object_vars($this->componentStateStorage["params"]);
                }
            }
            else 
            {
                /**
                 * Storage is stdClass
                 */
                if($this->componentStateStorage->params)
                {
                    $this->componentStateStorage->params = get_object_vars($this->componentStateStorage->params);
                }
            }
        
            // foreach(array($overrides) as $key => $value)
            // {
            //     $this->componentStateStorage[$key] = $value;
            // }
        }
    }