<?php
    namespace Sapphire\Component\Concerns;
    use Sapphire\Renderer;
    use Helpers\Support\Str;

    trait ChildComponent 
    {
        public function Component(string $name, array $params): void
        {
            $path = new Str($name);
            $final = $path->Replace('.', '/');
            
            // Getting the name of component folder
            $lastElement = $final->SplitToArray('/')->Last();

            // Adding component mark
            $final->Add("/$lastElement.component.php");

            // Adding params
            $params['__fromParentComponent'] = true;

            // Rendering the component
            Renderer::Render (
                $final->Get(),
                params: $params
            );
        }
    }