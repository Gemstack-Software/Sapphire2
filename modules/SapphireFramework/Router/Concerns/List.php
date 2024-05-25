<?php
    namespace Sapphire\Router\Concerns;
    use Sapphire\Router;

    trait RouterList 
    {
        public static function List(array $list): Router
        {
            return new Router('/', $list);
        }

        public function AddRoutesToList(array $list): void 
        {
            foreach($list as $key => $item)
            {
                $this->list[$key] = $item;
            }
        }

        public function GetList(): array 
        {
            if($this->prefix === '/api')
            {
                return [ 'api' => $this->list ];
            }
            else 
            {
                return $this->list;
            }
        }
    }