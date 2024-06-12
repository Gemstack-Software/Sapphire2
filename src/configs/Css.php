<?php
    use AquaCSS\Config;

    return function()
    {
        return (new Config())
            -> AddVariable('bgColor', '#0e3652')
            -> AddVariable('ftColor', '#eee')
            -> AddVariable('thColor', '#0099ff');
            // -> DefaultFillins('body', fn($el) => $el->Add('background', 'global("bgColor")')); 
    };