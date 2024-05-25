<?php
    namespace Sapphire\Router\Concerns;

    trait ApiRouter 
    {
        public function ApiRouter(): void
        {
            $this->prefix = '/api';
        }
    }