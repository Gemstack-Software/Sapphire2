<?php
    namespace Acid\Compiler\Concerns;
    use Helpers\Files\File;
    use Helpers\Files\Storage;
    use Helpers\Files\Cluster;
    use Helpers\Support\Str;
    use Acid\Compiler;

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
    }