<?php
    namespace Acid\Compiler\Concerns;
    use Helpers\Files\File;
    use Helpers\Files\Storage;
    use Helpers\Files\Cluster;
    use Helpers\Support\Str;
    use Helpers\Support\Arr;
    use Acid\Compiler;

    define("ACID_COMMENT_TAG_REGEX", "(\-\-[^}]*\-\-)");
    define("ACID_CONTENT_TAG_REGEX", "({\|[^}]*\|})");
    define("ACID_COMPONENT_TAG_REGEX", "(\<component:([^<]*)\>)");
    define("ACID_VALUE_REGEX", "(\|[^|]*\|)");
    define("ACID_VARIABLE_TAG_REGEX", "({\\$[^}]*})");
    define("ACID_FOREACH_REGEX", "(\<foreach [^\>]*\>)");
    define("ACID_IF_REGEX", "(\<if [^\>]*\>)");
    define("ACID_COMPLEX_REGEX", "(\<\<[^\)]*\>\>)");
    define("ACID_STYLE_REGEX", "(\<scoped:style src=\"[^\)]*\"\>\<\/scoped:style>)");
    define("ACID_AQUASTYLE_REGEX", "(\<scoped:style type=\"aqua\" src=\"[^\)]*\"\>\<\/scoped:style>)");
    define("ACID_REQUEST_SERVER_CACHED_REGEX", "(\<request:serverCached url=\"[^\"]*\" method=\"[^\"]*\"\>)");

    trait Compile 
    {
        public static function Compile(File $input, File $output, array $styles = []): File
        {
            $contents = new Str($input->Read()->GetContent());

            ////////////////////////////////
            // Add styles if they are
            ////////////////////////////////
            if($styles !== [])
            {
                $contents = static::AddStylesToUncompiledFile($contents, $styles);
            }

            ////////////////////////////////
            // Compile all syntax
            ////////////////////////////////

            $contents->ReplaceRegexWithCallbackLeaving(ACID_COMMENT_TAG_REGEX, [Compiler::class, 'CompileComment']);
            $contents->ReplaceRegexWithCallbackLeaving(ACID_CONTENT_TAG_REGEX, [Compiler::class, 'CompileContentTag']);
            $contents->ReplaceRegexWithCallbackLeaving(ACID_COMPONENT_TAG_REGEX, [Compiler::class, 'CompileComponentTag']);
            $contents->ReplaceRegexWithCallbackLeaving(ACID_VARIABLE_TAG_REGEX, [Compiler::class, 'CompileVariableTag']);
            $contents->ReplaceRegexWithCallbackLeaving(ACID_FOREACH_REGEX, [Compiler::class, 'CompileForeachTag']);
            $contents->ReplaceRegexWithCallbackLeaving(ACID_IF_REGEX, [Compiler::class, 'CompileIfTag']);
            $contents->ReplaceRegexWithCallbackLeaving(ACID_STYLE_REGEX, [Compiler::class, 'CompileStyleTag']);
            $contents->ReplaceRegexWithCallbackLeaving(ACID_AQUASTYLE_REGEX, [Compiler::class, 'CompileAquastyleTag']);
            $contents->ReplaceRegexWithCallbackLeaving(ACID_REQUEST_SERVER_CACHED_REGEX, [Compiler::class, 'CompileRequestServerCachedTag']);

            $contents->ReplaceRegexWithCallbackLeaving(ACID_VALUE_REGEX, [Compiler::class, 'CompileValueTag']);

            $contents->ReplaceLeaving("</foreach>", "<?php endforeach; ?>");
            $contents->ReplaceLeaving("<else>", "<?php else: ?>");
            $contents->ReplaceLeaving("</if>", "<?php endif; ?>");
            $contents->ReplaceLeaving("</request:serverCached>", "<?php \$__requestServerCached=null; ?>" . PHP_EOL . "<?php endif; ?>");

            $contents->ReplaceLeaving("@scope", "asc-scope=\"<?php echo \$component->GetUnique(); ?>\"");

            $contents->ReplaceRegexWithCallbackLeaving("/\<input/", [Compiler::class, 'CompileInput']);
            $contents->ReplaceRegexWithCallbackLeaving("/\<button/", [Compiler::class, 'CompileButton']);
            $contents->ReplaceRegexWithCallbackLeaving("/\<textarea/", [Compiler::class, 'CompileTextarea']);
            // $contents->ReplaceRegexWithCallbackLeaving("/\<select/", [Compiler::class, 'CompileSelect']);

            $contents->MinifyLeaving();

            ///////////////////////////////////////////////////////////
            // Returns the output file
            ///////////////////////////////////////////////////////////
            $output->Write($contents->Get());

            return $output;
        }

        public static function CompileContentTag($matches)
        {
            foreach($matches as $match)
            {
                $inside = substr($match, 2, strlen($match) - 4);

                return "<?php echo \$component->Store(\"$inside\") ?>";
            }
        }

        public static function CompileComponentTag($matches)
        {
            foreach($matches as $match)
            {
                $inside = substr($match, 11, strlen($match) - 13);
                $insideStr = new Str($inside);

                $args = $insideStr->SplitToArray(' ');

                $componentName = $args->First();
                $params = $args->AllWithout(0)->Join();

                if($params === '') $params = '[]';

                return "<?php echo \$component->Component('$componentName', $params); ?>";
            }
        }

        public static function CompileValueTag($matches)
        {
            foreach($matches as $match)
            {
                $inside = substr($match, 1, strlen($match) - 2);

                return "\$component->Store(\"$inside\")";
            }
        }

        public static function CompileVariableTag($matches)
        {
            foreach($matches as $match)
            {
                $inside = substr($match, 1, strlen($match) - 2);

                return "<?php echo $inside; ?>";
            }
        }

        public static function CompileForeachTag($matches)
        {
            foreach($matches as $match)
            {
                $inside = substr($match, 8, strlen($match) - 9);
                $inside = preg_replace_callback(ACID_COMPLEX_REGEX, [Compiler::class, 'CompileComplexTag'], $inside);

                return "<?php foreach($inside): ?>";
            }
        }
        
        public static function CompileIfTag($matches)
        {
            foreach($matches as $match)
            {
                $inside = substr($match, 3, strlen($match) - 4);
                $inside = preg_replace_callback(ACID_COMPLEX_REGEX, [Compiler::class, 'CompileComplexTag'], $inside);

                return "<?php if($inside): ?>";
            }
        }

        public static function CompileComplexTag($matches)
        {
            foreach($matches as $match)
            {
                $inside = substr($match, 2, strlen($match) - 4);

                return "($inside)";
            }
        }

        public static function CompileRequestServerCachedTag($matches) 
        {
            foreach($matches as $match)
            {
                /**
                 * Getting meta
                 */
                $tagWithoutBrackets = substr($match, 1, strlen($match) - 2);
                $args = explode(' ', $tagWithoutBrackets);

                $url;
                $method;

                foreach($args as $arg) 
                {
                    /**
                     * Getting the URL from attributes
                     */
                    if(str_starts_with($arg, "url=")) 
                    {
                        $url = explode('"', explode('url="', $arg)[1])[0];
                    }
                    /**
                     * Getting the Method from attributes
                     */
                    else if(str_starts_with($arg, "method=")) 
                    {
                        $method = explode('"', explode('method="', $arg)[1])[0];
                    }
                }

                /**
                 * Returning the container
                 */
                return ("<?php if(\$__requestServerCached = \Helpers\Formats\JSON::ToJSON(\Sapphire\Request::FetchCached('$method', '$url'))): ?>" . PHP_EOL .
                    "<?php \$response = \$__requestServerCached; ?>");
            }
        }

        public static function CompileInput($matches)
        {
            foreach($matches as $match)
            {
                return "<input acid4=\"" . static::GenerateAcid4ElementUuid() . "\"";
            }
        }

        public static function CompileTextarea($matches)
        {
            foreach($matches as $match)
            {
                return "<textarea acid4=\"" . static::GenerateAcid4ElementUuid() . "\"";
            }
        }

        public static function CompileSelect($matches)
        {
            foreach($matches as $match)
            {
                return "<select acid4=\"" . static::GenerateAcid4ElementUuid() . "\"";
            }
        }

        public static function CompileButton($matches)
        {
            foreach($matches as $match)
            {
                return "<button acid4=\"" . static::GenerateAcid4ElementUuid() . "\"";
            }
        }

        public static function CompileComment($matches)
        {
            foreach($matches as $match)
            {
                return "";
            }
        }
    }