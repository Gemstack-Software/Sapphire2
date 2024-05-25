<?php
    namespace Sapphire\Renderer\Concerns;
    use Helpers\Support\Str;

    trait Adapter 
    {
        public static function Adapter(Str $content): Str 
        {
            $content = $content->Replace('{adapter:config /}', '<script type="sapphire-adapter/config">{}</script>');
            $content = $content->Replace('{adapter:start /}', '<script src="/api/lmpd2m/adapter" defer></script>');
            $content = $content->Replace('{adapter:crystaller /}', '<script defer>window.sapphireAdapter.initCrystaller()</script>');

            return $content;
        }
    }