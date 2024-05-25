<?php
    namespace Helpers\Files\Cluster\Concerns;

    use Helpers\Files\Cluster;

    trait Path
    {
        public function GetPath(): string
        {
            $name = $this->GetName();
            $parent = $this->GetParentCluster();
            $parentPath = '';

            if($parent instanceof Cluster)
            {
                $parentPath = $parent->GetPath();
            }
            else 
            {   
                $parentPath = $parent;
            }

            return $parentPath . '/' . $name;
        }
    }