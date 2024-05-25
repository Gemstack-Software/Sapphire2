<?php
    namespace Helpers\Support\Str\Concerns;

    trait Minify
    {
        public function MinifyLeaving($withoutEols = false): void
        {
            // Replaces all tabulators
            do
            {
                $this->ReplaceLeaving("\t", " ");
            } while($this->Contains("\t"));

            // Delete all multi spaces
            do
            {
                $this->ReplaceLeaving("  ", " ");
            } while($this->Contains("  "));

            // Remove all double EOLs
            do
            {
                $this->ReplaceLeaving(PHP_EOL . PHP_EOL, PHP_EOL);
            } while($this->Contains(PHP_EOL . PHP_EOL));

            // Remove all single EOLs
            if($withoutEols)
            {
                $this->ReplaceLeaving(PHP_EOL, " ");
            } 
        }
    }