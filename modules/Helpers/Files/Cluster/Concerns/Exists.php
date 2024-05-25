<?php
    namespace Helpers\Files\Cluster\Concerns;

    trait Exists
    {
        public function Exists(): bool
        {
            return is_dir($this->GetPath());
        }
    }