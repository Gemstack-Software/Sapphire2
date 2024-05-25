<?php
    namespace Sapphire\Renderer\Concerns;

    use \ReflectionClass;
    use Sapphire\Response;
    use Sapphire\Component;
    use Helpers\Support\StringContent;
    use Helpers\Files\File;
    use Helpers\Support\Str;

    trait Classical 
    {
        /**
         * Renders component with layout (src/layouts/layout.html)
         */
        public static function RenderWithLayout (Component|string $renderable, string $additionalInformation = '', array $params = [], array $propsOverride = []): void
        {
            $layout = new File(BASE_DIR . '/src/layouts/layout.html');
            $content = new Str($layout->Read()->GetContent());
            
            /**
             * Replacing all adapter values in layout
             */
            $content = static::Adapter($content);

            /**
             * Cutting layout in {slot /}
             */
            [$before, $after] = $content->Split('{slot /}');

            /**
             * Rendering (before and after are parts of layout)
             */
            echo $before;
                static::Render($renderable, $additionalInformation, $params);
            echo $after;
        }

        /**
         * Renders component from Component or string (path to component)
         */
        public static function Render (Component|string $renderable, string $additionalInformation = '', array $params = [], array $propsOverride = []): void
        {
            if(gettype($renderable) === "string")
            {
                $componentFile = new File(BASE_DIR . '/' . $renderable, createIfNotExists: false);

                /**
                 * Instance component from file
                 */
                $component = $componentFile->Includes();

                /**
                 * Settuping component
                 */
                $component->thisComponentDirectoryPath = dirname(BASE_DIR . '/' . $renderable);
                $component->SetPath($componentFile->GetFullPath());
                $component->SetupMeta();

                /**
                 * Render
                 */
                $component->Render($params);
            }
            else if((new ReflectionClass($renderable))->getParentClass()->getName() === 'Sapphire\Component')
            {
                $renderable->Render($params);
            }
        }

        /**
         * This method echoes $html content to user, then ends response
         */
        public static function RenderHTML (string $html): void
        {
            Response::HTML($html);
        }
    }