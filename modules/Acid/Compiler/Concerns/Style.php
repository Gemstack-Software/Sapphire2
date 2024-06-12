<?php
    namespace Acid\Compiler\Concerns;
    use Helpers\Files\File;
    use Helpers\Files\Storage;
    use Helpers\Files\Cluster;
    use Helpers\Support\Str;
    use Acid\Compiler;
    use AquaCSS\CSS;

    define("AQUA_VARIABLE", "(\_[^_]*\_)");

    trait Style 
    {
        public static function CompileStyleTag($matches)
        {
            foreach($matches as $match)
            {
                $href  = new Str($match);
                $right = new Str($href->SplitToArray('<scoped:style src="')->Last());
                $left  = new Str($right->SplitToArray('">')->First());

                // Getting the style file
                $path = $left;
                $final = $path->Replace('.', '/');
                
                // Getting the name of style folder
                $lastElement = $final->SplitToArray('/')->Last();

                // Adding component mark
                $final->Add("/$lastElement.css");

                // Getting file
                $fileUncompiled = new File(BASE_DIR . '/' . $final->Get());
                $file = Compiler::Build ($fileUncompiled);

                $style = new Str($file->Read()->GetContent());
                $style->MinifyLeaving(withoutEols: true);
                $style->ReplaceLeaving(':component', '[unique="<?php echo $component->GetUnique(); ?>"]');

                return "<style>" . $style->Get() . "</style>";
            }
        }

        public static function CompileAquastyleTag($matches)
        {
            foreach($matches as $match)
            {
                $href  = new Str($match);
                $right = new Str($href->SplitToArray('<scoped:style type="aqua" src="')->Last());
                $left  = new Str($right->SplitToArray('">')->First());

                // Getting the style file
                $path = $left;
                $final = $path->Replace('.', '/');
                
                // Getting the name of style folder
                $lastElement = $final->SplitToArray('/')->Last();

                // Adding component mark
                $final->Add("/$lastElement.aqua");

                // Getting file
                $fileUncompiled = new File(BASE_DIR . '/' . $final->Get());
                $fileCompiledContent = CSS::Compile ($fileUncompiled);

                $style = new Str($fileCompiledContent);
                $style->MinifyLeaving(withoutEols: true);
                $style->ReplaceLeaving(':component', '[unique="<?php echo $component->GetUnique(); ?>"]');
                $style->ReplaceRegexWithCallbackLeaving(AQUA_VARIABLE, [Compiler::class, 'AquaStyleVariable']); 

                return "<style>" . $style->Get() . "</style>";
            }
        }

        public static function AquaStyleVariable($matches)
        {
            foreach($matches as $match)
            {
                $name = substr($match, 1, strlen($match) - 2);

                return '<?php echo $component->Store("style:' . $name . '"); ?>';
            }
        }

        public static function AddStylesToUncompiledFile(Str $contents, array $styles): Str 
        {
            foreach($styles["aquas"] as $aquaStyle)
            {
                $contents->Add('<scoped:style type="aqua" src="' . $aquaStyle->package . '"></scoped:style>');
            }

            foreach($styles["csses"] as $cssStyle)
            {
                $contents->Add('<scoped:style src="' . $cssStyle . '"></scoped:style>');
            }

            return $contents;
        }
    }