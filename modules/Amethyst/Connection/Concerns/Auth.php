<?php
    namespace Amethyst\Connection\Concerns;

    trait Auth 
    {
        public function Authorized(): bool
        {
            return $this->connectionConfig->user->credential === $this->credential;
        }
    }
