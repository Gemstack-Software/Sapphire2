<?php
    namespace Helpers\Files\Cluster\Concerns;

    trait Remove
    {
        public function Remove(): void
        {
            if (!$this->Exists())
                return;

            $this->Clear();
            rmdir($this->GetPath());
        }
    }