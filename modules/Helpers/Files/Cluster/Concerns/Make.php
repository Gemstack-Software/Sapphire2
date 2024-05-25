<?php
    namespace Helpers\Files\Cluster\Concerns;

    trait Make
    {
        public function MakeIfNotExists(): void
        {
            if ($this->Exists())
                return;

            mkdir($this->GetPath());
        }
    }