<?php
    namespace AquaCSS\Concerns;

    use AquaCSS\CSS;
    use Helpers\Files\File;
    use Helpers\Support\Str;
    use \Closure;

    trait Compile
    {
        public static function ApplyFunction(string $functionName, Str $content, array $callback)
        {
            // Making regex for function
            $regex = eval('return "/' . $functionName . '\([^)]*\)/";');

            // Replacing function with our callback
            $content->ReplaceRegexWithCallbackLeaving($regex, $callback);

            return $content;
        }

        public static function Compile(File $file): string
        {
            // Aquacss content
            $content = new Str($file->Read()->GetContent());

            $content = static::ApplyFunction('global', $content, [CSS::class, 'Global']);
            $content = static::ApplyFunction('px', $content, [CSS::class, 'Pixels']);
            $content = static::ApplyFunction('vw', $content, [CSS::class, 'ViewportWidth']);
            $content = static::ApplyFunction('vh', $content, [CSS::class, 'ViewportHeight']);
            $content = static::ApplyFunction('rem', $content, [CSS::class, 'REM']);
            $content = static::ApplyFunction('em', $content, [CSS::class, 'EM']);
            $content = static::ApplyFunction('per', $content, [CSS::class, 'Percentage']);

            return $content->Get();
        }
    }