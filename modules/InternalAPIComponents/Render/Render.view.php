<?php
    use Sapphire\Renderer;

    // New parameters
    $params = [ '__fromApiRender' => true ];
    
    // Change parameters
    foreach($component->Store('params') as $key => $value)
    {
        $params[$key] = $value;
    }

    // Render component
    Renderer::Render (
        $component->Store('componentPath'),
        params: $params
    );